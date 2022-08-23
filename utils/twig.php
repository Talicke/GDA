<?php
use Twig\Extra\Markdown\DefaultMarkdown;
use Twig\Extra\Markdown\MarkdownRuntime;
use Twig\RuntimeLoader\RuntimeLoaderInterface;


    include './vendor/autoload.php';

    $loader = new \Twig\Loader\FilesystemLoader('./templates');
    $twig = new \Twig\Environment($loader, [

    ]);

    $twig->addRuntimeLoader(new class implements RuntimeLoaderInterface {
        public function load($class) {
            if (MarkdownRuntime::class === $class) {
                return new MarkdownRuntime(new DefaultMarkdown());
            }
        }
    });

?>