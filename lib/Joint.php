<?php
define('nl', chr(10));

function println(string $string = '')
{
    print($string . PHP_EOL);
}

function isPath($file)
{
    if (strlen($file) < 256 && (strpos($file, "/") || strpos($file, "\\")))
    {
        if (file_exists($file))
        {
            return true;
        }
        println("The passed argument seems like a path but doesn't exist");
        return false;
    }
    return false;
}

function convertImagePathToBase64String($imagePath)
{
    try
    {
        $imageData = file_get_contents($imagePath);
        return base64_encode($imageData);
    }
    catch (Exception $ex)
    {
        throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
    }
}

function convertResourceToBase64String($resource)
{
    try
    {
        if (isPath($resource))
        {
            $resourceData = file_get_contents($resource);
            return base64_encode($resourceData);
        }
        else
        {
            return $resource;
        }
    }
    catch (Exception $ex)
    {
        throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
    }
}

function isBase64Encoded($str)
{
    try
    {
        $decoded = base64_decode($str, true);
        if (!$decoded)
        {
            return false;
        }
        if (base64_encode($decoded) === $str)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    catch (Exception $e)
    {
        // If exception is caught, then it is not a base64 encoded string
        return false;
    }
}

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
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function resetLicense()
    {
        try
        {
            $this->getJavaClass()->resetLicense();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function isLicensed(): string
    {
        try
        {
            $is_licensed = java_cast($this->getJavaClass()->isLicensed(), "string");
//            return strval($is_licensed);
            return $is_licensed;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    private static function openFile($filename)
    {
        try
        {
            return unpack("C*", file_get_contents($filename));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


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
        try
        {
            parent::__construct(new java(self::javaClassName, $x, $y));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    static function construct(...$args): Point
    {
        try
        {
            $point = self::EMPTY();
            $point->setJavaClass($args[0]);
            return $point;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    public function getX(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getX(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function getY(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getY(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function setX(int $x): void
    {
        try
        {
            $this->getJavaClass()->x = $x;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function setY(int $y): void
    {
        try
        {
            $this->getJavaClass()->y = $y;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function toString(): string
    {
        try
        {
            return $this->getJavaClass()->getX() . ',' . $this->getJavaClass()->getY();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function equals(Point $obj): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


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
        try
        {
            return new Rectangle(0, 0, 0, 0);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y, $width, $height)
    {
        try
        {
            parent::__construct(new java(self::javaClassName, $x, $y, $width, $height));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    static function construct(...$args): Rectangle
    {
        try
        {
            $rectangle = self::EMPTY();
            $rectangle->setJavaClass($args[0]);
            return $rectangle;

        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function getX(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getX(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function getY(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getY(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function getLeft(): int
    {
        return $this->getX();
    }

    public function getTop(): int
    {
        return $this->getY();
    }

    public function getRight(): int
    {
        return $this->getX() + $this->getWidth();
    }

    public function getBottom(): int
    {
        return $this->getY() + $this->getHeight();
    }

    public function getWidth(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getWidth(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function getHeight(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getHeight(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function toString(): string
    {
        try
        {
            return $this->getX() . ',' . $this->getY() . ',' . $this->getWidth() . ',' . $this->getHeight();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function equals(Rectangle $obj): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    private function intersectsWithInclusive(Rectangle $r): bool
    {
        try
        {
            return !(($this->getLeft() > $r->getRight()) || ($this->getRight() < $r->getLeft()) ||
                ($this->getTop() > $r->getBottom()) || ($this->getBottom() < $r->getTop()));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    /**
     * Intersect Shared Method
     * Produces a new Rectangle by intersecting 2 existing
     * Rectangles. Returns null if there is no    intersection.
     */

    public static function intersect(Rectangle $a, Rectangle $b): Rectangle
    {
        try
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
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    /**
     * FromLTRB Shared Method
     * Produces a Rectangle structure from left, top, right,
     * and bottom coordinates.
     */

    public static function fromLTRB(int $left, int $top, int $right, int $bottom): Rectangle
    {
        try
        {
            return new Rectangle($left, $top, $right - $left, $bottom - $top);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function isEmpty(): bool
    {
        try
        {
            return ($this->getWidth() <= 0) || ($this->getWidth() <= 0);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


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
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    protected abstract function init(): void;


    public function getJavaClass()
    {
        return $this->javaClass;
    }

    protected function setJavaClass($javaClass)
    {
        try
        {
            $this->javaClass = $javaClass;
            $this->init();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function getJavaClassName(): string
    {
        try
        {
            return $this->javaClassName;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function isNull(): bool
    {
        try
        {
            return java_cast($this->javaClass->isNull(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function printJavaClassName()
    {
        try
        {
            print("Java class name => '" . $this->javaClassName . "'");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


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
    public function __construct($message = "", $file = "", $line = "", $code = 0, Throwable $previous = null)
    {
        print "Exception occurred:" . $message . " at " . $file . ":" . $line . "\n";
        parent::__construct($code, $code, $previous);
        if (is_string($message))
        {
            $this->setMessage($message);
            return;
        }
        $line = $this->getLine();
        $file = $this->getFile();
        $exc_message = "Exception occured in $file:$line" . nl;
        $details = $this->getDetails($message);

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


    public function setMessage($message): void
    {
        $this->message = $message;
    }

}

?>
