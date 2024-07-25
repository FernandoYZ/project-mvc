<?php

namespace Core;

class TemplateCompiler {

    protected $file;
    protected $data;
    protected $sections = [];
    protected $currentSection;

    public function __construct($file, $data = []) {
        $this->file = realpath(__DIR__ . '/../' . $file);
        $this->data = $data;
    }

    public function compile() {
        if (!file_exists($this->file)) {
            throw new \Exception("File not found: " . $this->file);
        }

        $content = file_get_contents($this->file);

        // Variables de contenido
        $content = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?php echo htmlspecialchars($1, ENT_QUOTES, \'UTF-8\'); ?>', $content);
        $content = preg_replace('/\{\!\s*(.+?)\s*\!\}/', '<?php echo $1; ?>', $content);

        // Directivas de control de flujo
        $content = preg_replace('/@if\s*\((.+?)\)/', '<?php if ($1): ?>', $content);
        $content = preg_replace('/@else/', '<?php else: ?>', $content);
        $content = preg_replace('/@elseif\s*\((.+?)\)/', '<?php elseif ($1): ?>', $content);
        $content = preg_replace('/@endif/', '<?php endif; ?>', $content);

        // Directivas de bucles
        $content = preg_replace('/@foreach\s*\((.+?)\)/', '<?php foreach ($1): ?>', $content);
        $content = preg_replace('/@endforeach/', '<?php endforeach; ?>', $content);

        $content = preg_replace('/@for\s*\((.+?)\)/', '<?php for ($1): ?>', $content);
        $content = preg_replace('/@endfor/', '<?php endfor(); ?>', $content);

        $content = preg_replace('/@while\s*\((.+?)\)/', '<?php while ($1): ?>', $content);
        $content = preg_replace('/@endwhile/', '<?php endwhile; ?>', $content);

        // Directiva @csrf
        $content = preg_replace('/@csrf/', '<?php echo \Core\Security::generateCsrfTokenInput(); ?>', $content);

        // Directivas de secciones
        $content = preg_replace_callback('/@section\s*\((\'|")(.+?)(\'|")\)/', function ($matches) {
            $section = $matches[2];
            $this->currentSection = $section;
            $this->sections[$section] = '';
            return '<?php ob_start(); ?>';
        }, $content);

        $content = preg_replace_callback('/@endsection/', function () {
            return '<?php $this->sections[$this->currentSection] = ob_get_clean(); $this->currentSection = null; ?>';
        }, $content);

        $content = preg_replace('/@yield\s*\((\'|")(.+?)(\'|")\)/', '<?php echo $this->sections[$2] ?? ""; ?>', $content);

        return $content;
    }

    public function render() {
        extract($this->data);
        eval('?>' . $this->compile());
    }

    public function startSection($section) {
        $this->currentSection = $section;
        ob_start();
    }

    public function endSection() {
        $this->sections[$this->currentSection] = ob_get_clean();
        $this->currentSection = null;
    }

    public function yieldSection($section) {
        return $this->sections[$section] ?? '';
    }
}
