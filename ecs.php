<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\ArrayPushFixer;
use PhpCsFixer\Fixer\Alias\SetTypeToCastFixer;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoMultilineWhitespaceAroundDoubleArrowFixer;
use PhpCsFixer\Fixer\ArrayNotation\NormalizeIndexBraceFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\TrimArraySpacesFixer;
use PhpCsFixer\Fixer\ArrayNotation\WhitespaceAfterCommaInArrayFixer;
use PhpCsFixer\Fixer\Basic\BracesFixer;
use PhpCsFixer\Fixer\Basic\CurlyBracesPositionFixer;
use PhpCsFixer\Fixer\Basic\OctalNotationFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\CastNotation\ModernizeTypesCastingFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\ClassNotation\FinalPublicMethodForAbstractClassFixer;
use PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedInterfacesFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedTraitsFixer;
use PhpCsFixer\Fixer\ClassNotation\ProtectedToPrivateFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfStaticAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use PhpCsFixer\Fixer\Comment\NoTrailingWhitespaceInCommentFixer;
use PhpCsFixer\Fixer\Comment\SingleLineCommentSpacingFixer;
use PhpCsFixer\Fixer\ControlStructure\ControlStructureBracesFixer;
use PhpCsFixer\Fixer\ControlStructure\ControlStructureContinuationPositionFixer;
use PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer;
use PhpCsFixer\Fixer\ControlStructure\SimplifiedIfReturnFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\FunctionNotation\CombineNestedDirnameFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\LambdaNotUsedImportFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoUselessSprintfFixer;
use PhpCsFixer\Fixer\FunctionNotation\NullableTypeDeclarationForDefaultNullValueFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\Import\FullyQualifiedStrictTypesFixer;
use PhpCsFixer\Fixer\Import\GlobalNamespaceImportFixer;
use PhpCsFixer\Fixer\Import\GroupImportFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\NoUnneededImportAliasFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Import\SingleLineAfterImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveIssetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveUnsetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\ErrorSuppressionFixer;
use PhpCsFixer\Fixer\LanguageConstruct\FunctionToConstantFixer;
use PhpCsFixer\Fixer\LanguageConstruct\GetClassToClassKeywordFixer;
use PhpCsFixer\Fixer\LanguageConstruct\IsNullFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use PhpCsFixer\Fixer\NamespaceNotation\BlankLineAfterNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\SingleBlankLineBeforeNamespaceFixer;
use PhpCsFixer\Fixer\Operator\AssignNullCoalescingToCoalesceEqualFixer;
use PhpCsFixer\Fixer\Operator\LogicalOperatorsFixer;
use PhpCsFixer\Fixer\Operator\NewWithBracesFixer;
use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
use PhpCsFixer\Fixer\Operator\NoUselessNullsafeOperatorFixer;
use PhpCsFixer\Fixer\Operator\OperatorLinebreakFixer;
use PhpCsFixer\Fixer\Operator\StandardizeIncrementFixer;
use PhpCsFixer\Fixer\Operator\StandardizeNotEqualsFixer;
use PhpCsFixer\Fixer\Operator\TernaryToElvisOperatorFixer;
use PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocLineSpanFixer;
use PhpCsFixer\Fixer\PhpTag\NoClosingTagFixer;
use PhpCsFixer\Fixer\ReturnNotation\NoUselessReturnFixer;
use PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use PhpCsFixer\Fixer\Strict\StrictParamFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use PhpCsFixer\Fixer\StringNotation\StringLengthToEmptyFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBetweenImportGroupsFixer;
use PhpCsFixer\Fixer\Whitespace\HeredocIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesInsideParenthesisFixer;
use PhpCsFixer\Fixer\Whitespace\NoTrailingWhitespaceFixer;
use PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer;
use PhpCsFixer\Fixer\Whitespace\SingleBlankLineAtEofFixer;
use PhpCsFixer\Fixer\Whitespace\StatementIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\TypesSpacesFixer;
use Symplify\CodingStandard\Fixer\LineLength\DocBlockLineLengthFixer;
use Symplify\CodingStandard\Fixer\LineLength\LineLengthFixer;
use Symplify\CodingStandard\Fixer\Spacing\MethodChainingNewlineFixer;
use Symplify\CodingStandard\Fixer\Spacing\StandaloneLinePromotedPropertyFixer;
use Symplify\CodingStandard\Fixer\Strict\BlankLineAfterStrictTypesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([
        SetList::CLEAN_CODE,
        SetList::COMMON,
        SetList::PSR_12,
    ]);

    $ecsConfig->rules([
        ArrayPushFixer::class,
        SetTypeToCastFixer::class,
        ArraySyntaxFixer::class,
        NoMultilineWhitespaceAroundDoubleArrowFixer::class,
        NoWhitespaceBeforeCommaInArrayFixer::class,
        NormalizeIndexBraceFixer::class,
        TrimArraySpacesFixer::class,
        WhitespaceAfterCommaInArrayFixer::class,
        BracesFixer::class,
        CurlyBracesPositionFixer::class,
        OctalNotationFixer::class,
        CastSpacesFixer::class,
        ModernizeTypesCastingFixer::class,
        ClassAttributesSeparationFixer::class,
        FinalPublicMethodForAbstractClassFixer::class,
        NoBlankLinesAfterClassOpeningFixer::class,
        OrderedClassElementsFixer::class,
        OrderedInterfacesFixer::class,
        OrderedTraitsFixer::class,
        ProtectedToPrivateFixer::class,
        SelfAccessorFixer::class,
        SelfStaticAccessorFixer::class,
        VisibilityRequiredFixer::class,
        NoTrailingWhitespaceInCommentFixer::class,
        SingleLineCommentSpacingFixer::class,
        ControlStructureBracesFixer::class,
        ControlStructureContinuationPositionFixer::class,
        NoSuperfluousElseifFixer::class,
        NoUselessElseFixer::class,
        SimplifiedIfReturnFixer::class,
        YodaStyleFixer::class,
        CombineNestedDirnameFixer::class,
        FunctionDeclarationFixer::class,
        LambdaNotUsedImportFixer::class,
        MethodArgumentSpaceFixer::class,
        NoUselessSprintfFixer::class,
        NullableTypeDeclarationForDefaultNullValueFixer::class,
        ReturnTypeDeclarationFixer::class,
        VoidReturnFixer::class,
        FullyQualifiedStrictTypesFixer::class,
        GlobalNamespaceImportFixer::class,
        GroupImportFixer::class,
        NoLeadingImportSlashFixer::class,
        NoUnneededImportAliasFixer::class,
        NoUnusedImportsFixer::class,
        OrderedImportsFixer::class,
        SingleLineAfterImportsFixer::class,
        CombineConsecutiveIssetsFixer::class,
        CombineConsecutiveUnsetsFixer::class,
        ErrorSuppressionFixer::class,
        FunctionToConstantFixer::class,
        GetClassToClassKeywordFixer::class,
        IsNullFixer::class,
        ListSyntaxFixer::class,
        BlankLineAfterNamespaceFixer::class,
        SingleBlankLineBeforeNamespaceFixer::class,
        AssignNullCoalescingToCoalesceEqualFixer::class,
        LogicalOperatorsFixer::class,
        NewWithBracesFixer::class,
        NoUselessNullsafeOperatorFixer::class,
        NotOperatorWithSuccessorSpaceFixer::class,
        OperatorLinebreakFixer::class,
        StandardizeIncrementFixer::class,
        StandardizeNotEqualsFixer::class,
        TernaryToElvisOperatorFixer::class,
        TernaryToNullCoalescingFixer::class,
        NoClosingTagFixer::class,
        NoUselessReturnFixer::class,
        NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
        SemicolonAfterInstructionFixer::class,
        DeclareStrictTypesFixer::class,
        StrictComparisonFixer::class,
        StrictParamFixer::class,
        SingleQuoteFixer::class,
        StringLengthToEmptyFixer::class,
        ArrayIndentationFixer::class,
        BlankLineBeforeStatementFixer::class,
        BlankLineBetweenImportGroupsFixer::class,
        HeredocIndentationFixer::class,
        MethodChainingIndentationFixer::class,
        NoExtraBlankLinesFixer::class,
        NoSpacesInsideParenthesisFixer::class,
        NoTrailingWhitespaceFixer::class,
        NoWhitespaceInBlankLineFixer::class,
        SingleBlankLineAtEofFixer::class,
        StatementIndentationFixer::class,
        TypesSpacesFixer::class,
        BlankLineAfterStrictTypesFixer::class,
        MethodChainingNewlineFixer::class,
        StandaloneLinePromotedPropertyFixer::class,
    ]);

    $ecsConfig->skip([
        PhpdocLineSpanFixer::class,
    ]);

    $ecsConfig->ruleWithConfiguration(TrailingCommaInMultilineFixer::class, [
        'elements' => [
            TrailingCommaInMultilineFixer::ELEMENTS_ARRAYS,
            TrailingCommaInMultilineFixer::ELEMENTS_ARGUMENTS,
            TrailingCommaInMultilineFixer::ELEMENTS_PARAMETERS
        ],
    ]);

    $ecsConfig->ruleWithConfiguration(MultilineWhitespaceBeforeSemicolonsFixer::class, [
        'strategy' => MultilineWhitespaceBeforeSemicolonsFixer::STRATEGY_NEW_LINE_FOR_CHAINED_CALLS,
    ]);

    $ecsConfig->ruleWithConfiguration(DocBlockLineLengthFixer::class, [
        DocBlockLineLengthFixer::LINE_LENGTH => 40,
    ]);

    $ecsConfig->ruleWithConfiguration(LineLengthFixer::class, [
        LineLengthFixer::LINE_LENGTH => 120,
    ]);

    $ecsConfig->ruleWithConfiguration(
        HeaderCommentFixer::class,
        [
            'location' => 'after_open',
            'comment_type' => 'comment',
            'header' => <<<TEXT
                This file is part of the Eduroo Project.

                (c) Jakub Tobiasz

                For the full copyright and license information, please view the LICENSE
                file that was distributed with this source code.
                TEXT
        ]
    );

    $ecsConfig->parallel();
    $ecsConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);
};
