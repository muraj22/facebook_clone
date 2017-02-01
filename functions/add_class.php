<?php
if(!function_exists("addClass")){
    function addClass($node = null, $className) {
        $result = false;

        if (is_string($node)) {
            $dom = DOMDocument::loadXml($node);
            if ($dom instanceof DOMDocument) {
                $definedClasses = explode(' ', $dom->documentElement->getAttribute('class'));
                if (!in_array($className, $definedClasses)) {
                    $dom->documentElement->setAttribute(
                        'class', $dom->documentElement->getAttribute('class') . ' ' . $className
                    );
                }

                $result = $dom->saveXml($dom->documentElement, true);
            }
        }
        elseif ($node instanceof DOMElement) {
            // this code repetition, could of course be avoided using some more sophisticated structures 
            $definedClasses = explode(' ', $node->getAttribute('class'));
            if (!in_array($className, $definedClasses)) {
                $node->setAttribute('class', $node->getAttribute('class') . ' ' . $className);
            }

            $result = $node;
        }

        return $result;
    }
}
?>