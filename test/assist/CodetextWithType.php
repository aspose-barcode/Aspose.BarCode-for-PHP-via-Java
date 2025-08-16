<?php
namespace assist;

class CodetextWithType
{

    public $Readtype = null;
    public $Codetext = "";
    function __constructor($aReadtype, string $aCodetext)
    {
        $this->Readtype = $aReadtype;
        $this->Codetext = $aCodetext;
    }

    public function equals(Object $obj): bool
    {
        if (!($obj instanceof CodetextWithType))
            return false;
        $other = $obj;
        return $this->Readtype == $other->Readtype && $this->Codetext == ($other->Codetext);
    }

    public function __toString()
    {
        return $this->Readtype . ": " . $this->Codetext;
    }
}