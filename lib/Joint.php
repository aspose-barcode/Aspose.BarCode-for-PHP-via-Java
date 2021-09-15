<?php
define('nl', chr(10));

class License extends BaseJavaClass
{
    protected $javaClassName = "com.aspose.php.barcode.license.PhpLicense";

    public function __construct()
    {
        parent::__construct(new java($this->javaClassName));
    }

    public function setLicense($filePath)
    {
        try
        {
            $file_data = self::openFile($filePath);
            $this->getJavaClass()->setLicense($file_data);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

     public function resetLicense()
    {
        try
        {
            $this->getJavaClass()->resetLicense();
        } catch (Exception $ex)
        {
            throw new BarcodeException($ex);
        }
    }

    public function isLicensed(): string
    {
        $is_licensed = $this->getJavaClass()->isLicensed();
        return strval($is_licensed);
    }

    private static function openFile($filename)
    {
        return unpack("C*", file_get_contents($filename));
    }

    protected function init(): void
    {
//      do nothing
    }
}

class Point extends BaseJavaClass
{
    private const javaClassName = "java.awt.Point";

    /**
     * Represents a Quadrangle structure with its properties left uninitialized.Value: Quadrangle
     */
    public static function EMPTY(): Point
    {
        return new Point(0, 0);
    }

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        parent::__construct(new java(self::javaClassName, $x, $y));
    }

    static function construct(...$args) : Point
    {
        $point = self::EMPTY();
        $point->setJavaClass($args[0]);
        return $point;
    }

    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    public function getX():int
    {
        return java_cast($this->getJavaClass()->getX(), "integer");
    }

    public function getY():int
    {
        return java_cast($this->getJavaClass()->getY(), "integer");
    }

    public function setX(int $x):void
    {
        $this->getJavaClass()->x = $x;
    }

    public function setY(int $y):void
    {
        $this->getJavaClass()->y = $y;
    }

    public function toString() : string
    {
        return $this->getJavaClass()->getX() . ',' . $this->getJavaClass()->getY();
    }

    public function equals(Point $obj): bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }
}

class Rectangle extends BaseJavaClass
{
    private const javaClassName = "java.awt.Rectangle";

    /**
     * Represents a Quadrangle structure with its properties left uninitialized.Value: Quadrangle
     */
    public static function EMPTY(): Rectangle
    {
        return new Rectangle(0, 0,0,0);
    }

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y, $width, $height)
    {
        parent::__construct(new java(self::javaClassName, $x, $y, $width, $height));
    }

    static function construct(...$args) : Rectangle
    {
        $rectangle = self::EMPTY();
        $rectangle->setJavaClass($args[0]);
        return $rectangle;
    }

    public function getX() : int
    {
        return java_cast($this->getJavaClass()->getX(), "integer");
    }

    public function getY() : int
    {
        return java_cast($this->getJavaClass()->getY(), "integer");
    }

    public function getLeft() : int
    {
        return $this->getX();
    }

    public function getTop() : int
    {
        return $this->getY();
    }

    public function getRight() : int
    {
        return $this->getX() + $this->getWidth();
    }

    public function getBottom() : int
    {
        return $this->getY() + $this->getHeight();
    }

    public function getWidth() : int
    {
        return java_cast($this->getJavaClass()->getWidth(), "integer");
    }

    public function getHeight() : int
    {
        return java_cast($this->getJavaClass()->getHeight(), "integer");
    }

    public function toString() : string
    {
        return $this->getX() . ',' . $this->getY() . ',' . $this->getWidth() . ',' . $this->getHeight();
    }

    public function equals(Rectangle $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    private function intersectsWithInclusive(Rectangle $r) : bool
    {
        return !(($this->getLeft() > $r->getRight()) || ($this->getRight() < $r->getLeft()) ||
            ($this->getTop() > $r->getBottom()) || ($this->getBottom() < $r->getTop()));
    }

    /**
     * Intersect Shared Method
     * Produces a new Rectangle by intersecting 2 existing
     * Rectangles. Returns null if there is no    intersection.
     */

    public static function intersect(Rectangle $a, Rectangle $b): Rectangle
    {
        // MS.NET returns a non-empty rectangle if the two rectangles
        // touch each other
        if (!$a->intersectsWithInclusive($b))
        {
            return new Rectangle(0, 0, 0, 0);
        }

        return Rectangle::fromLTRB(
            max($a->getLeft(), $b->getLeft()),
            max($a->getTop(), $b->getTop()),
            min($a->getRight(), $b->getRight()),
            min($a->getBottom(), $b->getBottom()));
    }

    /**
     * FromLTRB Shared Method
     * Produces a Rectangle structure from left, top, right,
     * and bottom coordinates.
     */

    public static function fromLTRB(int $left, int $top,
                                    int $right, int $bottom): Rectangle
    {
        return new Rectangle($left, $top, $right - $left,
            $bottom - $top);
    }

    public function isEmpty() : bool
    {
        return ($this->getWidth() <= 0) || ($this->getWidth() <= 0);
    }

    protected function init(): void
    {
        // TODO: Implement init() method.
    }
}

abstract class BaseJavaClass
{
    private $javaClass;
    private $javaClassName;

    function __construct($javaClass)
    {
        try
        {
            $this->javaClass = $javaClass;
            $this->init();

            if (empty($this->javaClassName))
            {
                $this->javaClassName = $this->javaClass->__signature;
            }
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    protected abstract function init(): void;

    /**
     * @return mixed
     */
    public function getJavaClass()
    {
        return $this->javaClass;
    }

    /**
     * @return mixed
     */
    protected function setJavaClass($javaClass)
    {
        $this->javaClass= $javaClass;
        $this->init();
    }

    public function getJavaClassName(): string
    {
        return $this->javaClassName;
    }

    public function isNull(): bool
    {
        return java_cast($this->javaClass->isNull(), "boolean");
    }

    public function printJavaClassName()
    {
        print("Java class name => '" . $this->javaClassName . "'");
    }
}

/**
 * Class BarcodeException
 */
class BarcodeException extends Exception
{
    const MAX_LINES = 34;

    /**
     * BarcodeException constructor.
     * @param  $exc exception's instance
     */
    public function __construct($exc)
    {
        if (is_string($exc))
        {
            $this->setMessage($exc);
            return;
        }
        $line = $this->getLine();
        $file = $this->getFile();
        $exc_message = "Exception occured in $file:$line" . nl;
        $details = $this->getDetails($exc);

        if (empty($details))
        {
            $this->setMessage($exc_message);
            return;
        }
        $lines = explode("\n", $details);


        $counter = 0;
        foreach ($lines as $line)
        {
            if ($counter >= self::MAX_LINES)
            {
                break;
            }
            $counter++;
            $exc_message .= $line . nl;
        }
        $this->setMessage($exc_message);
    }

    private function getDetails($exc)
    {
        $details = "";
        if (is_string($exc))
        {
            return $exc;
        }
        if (get_class($exc) != null)
        {
            $details = "exception type : " . get_class($exc) . "\n";
        }
        if (method_exists($exc, "__toString"))
        {
            $details .= $exc->__toString();
        }
        if (method_exists($exc, "getMessage"))
        {
            $details .= $exc->getMessage();
        }
        if (method_exists($exc, "getCause"))
        {
            $details .= $exc->getCause();
        }
        return $details;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

}

?>
