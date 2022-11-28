<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeInauIcons\BladeInauIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('inau-menu-2')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" viewBox="0 0 10.583333 10.583334" fill="currentColor"><defs id="defs2"/><sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="-9" inkscape:window-x="-9" inkscape:window-height="1001" inkscape:window-width="1920" units="px" showgrid="false" inkscape:document-rotation="0" inkscape:current-layer="layer1" inkscape:document-units="px" inkscape:cy="24.138239" inkscape:cx="7.6033668" inkscape:zoom="15.839192" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base"/><g id="layer1" inkscape:groupmode="layer" inkscape:label="Layer 1"><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3" width="2.6458333" height="10.583334" x="7.9375005" y="-10.583334" transform="rotate(90)"/><rect transform="rotate(90)" y="-10.583334" x="3.96875" height="10.583334" width="2.6458335" id="rect5176-3-9" style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"/><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3-9-9" width="2.6458335" height="10.583334" x="0" y="-10.583334" transform="rotate(90)"/></g></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('inau-menu-2', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" viewBox="0 0 10.583333 10.583334" fill="currentColor"><defs id="defs2"/><sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="-9" inkscape:window-x="-9" inkscape:window-height="1001" inkscape:window-width="1920" units="px" showgrid="false" inkscape:document-rotation="0" inkscape:current-layer="layer1" inkscape:document-units="px" inkscape:cy="24.138239" inkscape:cx="7.6033668" inkscape:zoom="15.839192" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base"/><g id="layer1" inkscape:groupmode="layer" inkscape:label="Layer 1"><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3" width="2.6458333" height="10.583334" x="7.9375005" y="-10.583334" transform="rotate(90)"/><rect transform="rotate(90)" y="-10.583334" x="3.96875" height="10.583334" width="2.6458335" id="rect5176-3-9" style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"/><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3-9-9" width="2.6458335" height="10.583334" x="0" y="-10.583334" transform="rotate(90)"/></g></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('inau-menu-2', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" viewBox="0 0 10.583333 10.583334" fill="currentColor"><defs id="defs2"/><sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="-9" inkscape:window-x="-9" inkscape:window-height="1001" inkscape:window-width="1920" units="px" showgrid="false" inkscape:document-rotation="0" inkscape:current-layer="layer1" inkscape:document-units="px" inkscape:cy="24.138239" inkscape:cx="7.6033668" inkscape:zoom="15.839192" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base"/><g id="layer1" inkscape:groupmode="layer" inkscape:label="Layer 1"><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3" width="2.6458333" height="10.583334" x="7.9375005" y="-10.583334" transform="rotate(90)"/><rect transform="rotate(90)" y="-10.583334" x="3.96875" height="10.583334" width="2.6458335" id="rect5176-3-9" style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"/><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3-9-9" width="2.6458335" height="10.583334" x="0" y="-10.583334" transform="rotate(90)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-inau-icons.class', 'awesome');

        $result = svg('inau-menu-2')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" viewBox="0 0 10.583333 10.583334" fill="currentColor"><defs id="defs2"/><sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="-9" inkscape:window-x="-9" inkscape:window-height="1001" inkscape:window-width="1920" units="px" showgrid="false" inkscape:document-rotation="0" inkscape:current-layer="layer1" inkscape:document-units="px" inkscape:cy="24.138239" inkscape:cx="7.6033668" inkscape:zoom="15.839192" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base"/><g id="layer1" inkscape:groupmode="layer" inkscape:label="Layer 1"><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3" width="2.6458333" height="10.583334" x="7.9375005" y="-10.583334" transform="rotate(90)"/><rect transform="rotate(90)" y="-10.583334" x="3.96875" height="10.583334" width="2.6458335" id="rect5176-3-9" style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"/><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3-9-9" width="2.6458335" height="10.583334" x="0" y="-10.583334" transform="rotate(90)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-inau-icons.class', 'awesome');

        $result = svg('inau-menu-2', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" viewBox="0 0 10.583333 10.583334" fill="currentColor"><defs id="defs2"/><sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="-9" inkscape:window-x="-9" inkscape:window-height="1001" inkscape:window-width="1920" units="px" showgrid="false" inkscape:document-rotation="0" inkscape:current-layer="layer1" inkscape:document-units="px" inkscape:cy="24.138239" inkscape:cx="7.6033668" inkscape:zoom="15.839192" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base"/><g id="layer1" inkscape:groupmode="layer" inkscape:label="Layer 1"><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3" width="2.6458333" height="10.583334" x="7.9375005" y="-10.583334" transform="rotate(90)"/><rect transform="rotate(90)" y="-10.583334" x="3.96875" height="10.583334" width="2.6458335" id="rect5176-3-9" style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"/><rect style="fill:currentColor;fill-opacity:1;stroke:none;stroke-width:0.213571;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="rect5176-3-9-9" width="2.6458335" height="10.583334" x="0" y="-10.583334" transform="rotate(90)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeInauIconsServiceProvider::class,
        ];
    }
}
