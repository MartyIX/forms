<?php

/**
 * Test: Nette\Bridges\FormsLatte\FormMacros: GET form
 */

use Nette\Bridges\FormsLatte\Runtime;
use Nette\Forms\Form;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';

$form = new Form;
$form->setMethod('GET');
$form->action = 'http://example.com/?do=foo-submit#toc';

ob_start();
Runtime::renderFormBegin($form, array());
Assert::same('<form action="http://example.com/#toc" method="get">', ob_get_clean());

ob_start();
Runtime::renderFormEnd($form);
Assert::match('<div><input type="hidden" name="do" value="foo-submit"><!--[if IE]><input type=IEbug disabled style="display:none"><![endif]--></div>
</form>
', ob_get_clean());
