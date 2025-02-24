<?php

namespace Yoti\DocScan;

class Constants
{
    public const ID_DOCUMENT_AUTHENTICITY = 'ID_DOCUMENT_AUTHENTICITY';
    public const ID_DOCUMENT_COMPARISON = 'ID_DOCUMENT_COMPARISON';
    public const ID_DOCUMENT_TEXT_DATA_CHECK = 'ID_DOCUMENT_TEXT_DATA_CHECK';
    public const SUPPLEMENTARY_DOCUMENT_TEXT_DATA_CHECK = 'SUPPLEMENTARY_DOCUMENT_TEXT_DATA_CHECK';
    public const ID_DOCUMENT_FACE_MATCH = 'ID_DOCUMENT_FACE_MATCH';
    public const THIRD_PARTY_IDENTITY = 'THIRD_PARTY_IDENTITY';
    public const LIVENESS = 'LIVENESS';
    public const WATCHLIST_SCREENING = 'WATCHLIST_SCREENING';
    public const WATCHLIST_ADVANCED_CA = 'WATCHLIST_ADVANCED_CA';

    public const WITH_YOTI_ACCOUNT = 'WITH_YOTI_ACCOUNT';
    public const WITH_CUSTOM_ACCOUNT = 'WITH_CUSTOM_ACCOUNT';
    public const TYPE_LIST = 'TYPE_LIST';
    public const PROFILE = 'PROFILE';
    public const EXACT = 'EXACT';
    public const FUZZY = 'FUZZY';
    public const FACE_CAPTURE = 'FACE_CAPTURE';

    public const MANDATORY = "MANDATORY";
    public const NOT_ALLOWED = "NOT_ALLOWED";


    public const ADVERSE_MEDIA = 'ADVERSE-MEDIA';
    public const SANCTIONS = 'SANCTIONS';

    public const ID_DOCUMENT_TEXT_DATA_EXTRACTION = 'ID_DOCUMENT_TEXT_DATA_EXTRACTION';
    public const SUPPLEMENTARY_DOCUMENT_TEXT_DATA_EXTRACTION = 'SUPPLEMENTARY_DOCUMENT_TEXT_DATA_EXTRACTION';

    public const ID_DOCUMENT = 'ID_DOCUMENT';
    public const SUPPLEMENTARY_DOCUMENT = 'SUPPLEMENTARY_DOCUMENT';
    public const ORTHOGONAL_RESTRICTIONS = 'ORTHOGONAL_RESTRICTIONS';
    public const DOCUMENT_RESTRICTIONS = 'DOCUMENT_RESTRICTIONS';
    public const INCLUSION_WHITELIST = 'WHITELIST';
    public const INCLUSION_BLACKLIST = 'BLACKLIST';

    public const ALWAYS = 'ALWAYS';
    public const FALLBACK = 'FALLBACK';
    public const NEVER = 'NEVER';

    public const UK_POST_OFFICE = "UK_POST_OFFICE";

    public const BASIC = 'BASIC';
    public const BEARER = 'BEARER';

    public const END_USER = 'END_USER';
    public const RELYING_BUSINESS = 'RELYING_BUSINESS';
    public const IBV = 'IBV';
}
