<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    exclude-result-prefixes="xs"
    version="2.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Songs</title>
                <link rel="stylesheet" type="text/css" href="editor.css"/>
            </head>
            <body>
                <xsl:apply-templates/>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="nounPhrase">
        <span class="nounPhrase">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="verbPhrase">
        <span class="verbPhrase">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="adjective">
        <span class="adjective">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="prepPhrase">
        <span class="prepPhrase">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="prep">
        <span class="prep">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="noun">
        <span class="noun">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="verb">
        <span class="verb">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="det">
        <span class="det">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
    <xsl:template match="adverb">
        <span class="adverb">
            <xsl:apply-templates/>
        </span>
    </xsl:template>
</xsl:stylesheet>