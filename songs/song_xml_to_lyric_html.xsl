<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    version="2.0">
    <xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
    <xsl:template match="/">
        <xsl:apply-templates select="//song/lyrics/verse"/>
    </xsl:template>
    
    <xsl:template match="verse">
        <div class="verse">
            <xsl:apply-templates select="./line | ./refrainSectionRef" />
        </div>
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
   
</xsl:stylesheet>