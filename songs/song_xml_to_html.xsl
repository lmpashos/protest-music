<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns="http://www.w3.org/1999/xhtml" version="2.0">
    <xsl:output method="xhtml" indent="yes"
        doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Protest Music</title>
            </head>
            <body>
                <h1><xsl:apply-templates select="//song/metadata/title"/></h1>
                <h3><xsl:apply-templates select="//song/metadata/composer"/></h3>
                <h3><xsl:apply-templates select="//song/metadata/album"/></h3>
                <h3><xsl:apply-templates select="//song/metadata/year"/></h3>
                <h3>
                    <xsl:for-each select="//song/metadata/genre">
                        <xsl:value-of select="."/>
                        <xsl:if test="position() != last()">
                            <xsl:text>, </xsl:text>
                        </xsl:if>
                    </xsl:for-each>
                </h3>
                <h3>
                    <xsl:for-each select="//song/metadata/notablePerformer">
                        <xsl:value-of select="."/>
                        <xsl:if test="position() != last()">
                            <xsl:text>, </xsl:text>
                        </xsl:if>
                    </xsl:for-each>
                </h3>
                <hr />
                <xsl:apply-templates select="//song/lyrics/verse"/>
            </body>
        </html>

    </xsl:template>
    <xsl:template match="title">
        <xsl:apply-templates />
    </xsl:template>
    <xsl:template match="composer">
        <xsl:apply-templates />
    </xsl:template>
    <xsl:template match="album">
        <xsl:apply-templates />
    </xsl:template>
    <xsl:template match="year">
        <xsl:apply-templates />
    </xsl:template>
    
    <xsl:template match="verse">
        <p>
            <xsl:apply-templates select="./line | ./refrainSectionRef" />
        </p>
    </xsl:template>
    
    <xsl:template match="line">
        <xsl:apply-templates /><br />
    </xsl:template>
    
    <!-- I want to put the value of the actual refrain section into here based on the sectionRef,
         but I am not sure how to get this to work.
         
         What I am doing seems to work, but I am not sure this is the most efficient or best way
    -->
    <xsl:template match="refrainSectionRef">
        <xsl:variable name="sectionRef" select="@sectionRef" />
        <xsl:for-each select="../../refrainSection"> 
            <xsl:if test="./@sectionID = $sectionRef">
                <xsl:apply-templates select="./refrainLineRef" />
            </xsl:if>
        </xsl:for-each>
        
    
    </xsl:template>
    
    <xsl:template match="refrainLineRef">
        <xsl:variable name="lineRef" select="@lineRef" />
        
        <xsl:for-each select="../../refrainLine">
            
            <xsl:if test="./@lineID = $lineRef">
                <xsl:apply-templates /><br />
            </xsl:if>
        </xsl:for-each>
        
    </xsl:template>
   
</xsl:stylesheet>