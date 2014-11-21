<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    version="1.0">
    <xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
    <xsl:template match="/">
        <xsl:apply-templates select="//song/lyrics/verse"/>
    </xsl:template>
    
    <xsl:template match="verse">
        <p>
            <xsl:apply-templates select="./line | ./refrainSectionRef" />
        </p>
    </xsl:template>
    
    <xsl:template match="line">
        <span class="line">
            <xsl:apply-templates />
        </span>
        <br />
    </xsl:template>
    
    <xsl:template match="refrainSectionRef">
        <span class="refrain_section">
            <xsl:apply-templates select="//refrainSection[@sectionID = current()/@sectionRef]"/>
        </span>
    </xsl:template>
    <xsl:template match="refrainSection">
        <xsl:apply-templates/>
    </xsl:template>
    <xsl:template match="refrainLineRef">
        <span class="refrain_line">
            <xsl:apply-templates select="//refrainLine[@lineID = current()/@lineRef]"/>
        </span>
        <br />
    </xsl:template>
    
    <xsl:template match="nounPhrase">
        <span class="nounPhrase">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="noun">
        <span class="noun">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="det">
        <span class="det">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="verbPhrase">
        <span class="verbPhrase">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="verb">
        <span class="verb">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="adverb">
        <span class="adverb">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="adjective">
        <span class="adjective">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="prepPhrase">
        <span class="prepPhrase">
            <xsl:apply-templates />
        </span>
    </xsl:template>
    
    <xsl:template match="prep">
        <span class="prep">
            <xsl:apply-templates />
        </span>
    </xsl:template>
   
</xsl:stylesheet>