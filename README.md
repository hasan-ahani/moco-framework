# Moco Framework
Wordpress Development Framework Theme &amp; Plugin Options

## How to install

If you wish to use this extension in a managed environment, simply install using `composer`:

```
composer require hasanart/moco-framework
```

To use the Moco Framework

```php
// include vendor autoloader
include('vendor/autoload.php');

use MocoFramework\Helper\Controls;


//use Globa Variable
global $moco_framework;


// set your Tabs & option Controls
$options = [        
    //tabs
    [
        'id'        => 'general',
        'title'     => 'General',
        'icon'      => 'fa-dashboard',
        'controls'    => [
            [
                'id'     => 'Text Control',
                'type'      => Controls::Text,
                'title'     => 'wordpress test',
                'desc'     => 'wordpress test test',
                'placeholder'     => 'wordpress ...',
                'default'     => 'wordpress ...',
                'detail'     => 'wordpress detail'
            ],
            [
                'id'        => 'js',
                'type'      => Controls::CodeEditor,
                'title'     => 'codeEditor',
            ],
            [

                'id'        => 'wp_editor',
                'type'      => Controls::WpEditor,
                'title'     => 'Wp Editor',
                'default'   => 'defaul content with support html',
            ]
        ]
    ],
    //external tab link ()
    [
        'id'        => 'external',
        'title'     => 'External',
        'icon'      => 'fa-external',
        'link'      => 'https://wpdev.ir/',
    ]
];

//make new option page 
$moco_framework->option()
	->setTitle('Moco Framework Options')
	->setSubTitle('the best of options package')
	->setMenu('Moco Options')
	->setSlug('moco-options')
	->setPosition(99)
	->options($options);

```

## Todo Project

- [x] Text
- [x] Textarea
- [x] Code Editor
- [x] Wp Editor
- [ ] Select Media
- [ ] Checkbox
- [ ] Radio
- [ ] Switch
- [ ] Select
- [ ] Select2
- [ ] Draggable
- [ ] Draggable

## Todo Field

- [x] Option Page
- [ ] Metabox
- [ ] Customize Option
- [ ] Widget
- [ ] Menu Option
