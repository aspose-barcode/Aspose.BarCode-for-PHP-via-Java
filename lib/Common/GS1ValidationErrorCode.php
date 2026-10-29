<?php
namespace Aspose\Barcode\Common;

/**
 * Identifies a GS1 element string, Digital Link URI or value validation error.
 */
final class GS1ValidationErrorCode {
    /** The supplied GS1 element string is empty. */
    public const EMPTY_ELEMENT_STRING = 0;
    /** An opening parenthesis that should begin an Application Identifier is missing. */
    public const MISSING_OPENING_PARENTHESIS = 1;
    /** An Application Identifier has no closing parenthesis. */
    public const MISSING_CLOSING_PARENTHESIS = 2;
    /** An Application Identifier does not contain two to four ASCII digits. */
    public const INVALID_APPLICATION_IDENTIFIER = 3;
    /** The supplied Application Identifier is not defined by the supported GS1 Syntax Dictionary. */
    public const UNKNOWN_APPLICATION_IDENTIFIER = 4;
    /** An Application Identifier is present without a value. */
    public const MISSING_VALUE = 5;
    /** A value contains an unsupported escape sequence. Only \( is supported. */
    public const INVALID_ESCAPE_SEQUENCE = 6;
    /** A value is shorter than the minimum length defined for its Application Identifier. */
    public const VALUE_TOO_SHORT = 7;
    /** A value is longer than the maximum length defined for its Application Identifier. */
    public const VALUE_TOO_LONG = 8;
    /** A value contains a character outside the character set permitted for its component. */
    public const INVALID_CHARACTER = 9;
    /** A numeric or alphabetic checksum is invalid. */
    public const INVALID_CHECKSUM = 10;
    /** A date component is not a meaningful date under the rules defined for its Application Identifier. */
    public const INVALID_DATE = 11;
    /** A time component is outside its permitted range or has an invalid structure. */
    public const INVALID_TIME = 12;
    /** A component value is not present in its permitted closed code list. */
    public const INVALID_CODE_LIST_VALUE = 13;
    /** A component does not satisfy its component-specific length structure. */
    public const INVALID_COMPONENT_LENGTH = 14;
    /** A fixed-length component ends before all required characters are present. */
    public const TRUNCATED_COMPONENT = 15;
    /** Data remains after all components defined for the Application Identifier have been consumed. */
    public const UNEXPECTED_DATA = 16;
    /** A component violates a content rule that has no more specific validation error code. */
    public const INVALID_VALUE = 17;
    /** A component is too short to contain the minimum four-digit structural GS1 Company Prefix. */
    public const GCP_PREFIX_TOO_SHORT = 18;
    /** The structural GS1 Company Prefix contains a character other than an ASCII digit. */
    public const INVALID_GCP_PREFIX = 19;
    /** The supplied value is not a well-formed absolute GS1 Digital Link URI. */
    public const INVALID_DIGITAL_LINK_URI = 20;
    /** A GS1 Digital Link URI uses a scheme other than HTTP or HTTPS. */
    public const UNSUPPORTED_DIGITAL_LINK_SCHEME = 21;
    /** A GS1 Digital Link URI path does not contain a supported primary key. */
    public const MISSING_DIGITAL_LINK_PRIMARY_KEY = 22;
    /** A GS1 Digital Link URI path does not consist of valid AI and value pairs. */
    public const INVALID_DIGITAL_LINK_PATH = 23;
    /** A path Application Identifier is not a permitted qualifier at that position. */
    public const INVALID_DIGITAL_LINK_QUALIFIER = 24;
    /** A GS1 Digital Link query parameter is malformed. */
    public const INVALID_DIGITAL_LINK_QUERY_PARAMETER = 25;
    /** An Application Identifier is not permitted as a GS1 Digital Link data attribute. */
    public const APPLICATION_IDENTIFIER_NOT_ALLOWED_IN_DIGITAL_LINK = 26;
    /** A GS1 Digital Link URI component contains malformed percent encoding. */
    public const INVALID_PERCENT_ENCODING = 27;
    /** More than one element could be selected as the GS1 Digital Link primary key. */
    public const MULTIPLE_DIGITAL_LINK_PRIMARY_KEYS = 28;
    /** The supplied combination of GS1 elements is not supported by the selected symbology or encoding mode. */
    public const UNSUPPORTED_ELEMENT_COMBINATION = 29;
}
