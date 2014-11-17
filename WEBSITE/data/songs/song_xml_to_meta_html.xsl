<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    version="1.0">
    <xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
    <xsl:template match="/">
        <div class="title">
            <xsl:apply-templates select="//song/metadata/title"/>
        </div>
        <div class="composer">
            <xsl:for-each select="//song/metadata/composer">
                <xsl:value-of select="."/>
                <xsl:if test="position() != last()">
                    <xsl:text>, </xsl:text>
                </xsl:if>
            </xsl:for-each>
        </div>
        <div class="album">
            <xsl:apply-templates select="//song/metadata/album"/>
        </div>
        <div class="year">
            <xsl:apply-templates select="//song/metadata/year"/>
        </div>
        <div class="genre">
            <xsl:for-each select="//song/metadata/genre">
                <xsl:value-of select="."/>
                <xsl:if test="position() != last()">
                    <xsl:text>, </xsl:text>
                </xsl:if>
            </xsl:for-each>
        </div>
        <div class="notable_performer">
            <xsl:for-each select="//song/metadata/notablePerformer">
                <xsl:value-of select="."/>
                <xsl:if test="position() != last()">
                    <xsl:text>, </xsl:text>
                </xsl:if>
            </xsl:for-each>
        </div>
        <xsl:if test="count(//song/metadata/notablePerformance) > 0">        
            <div class="notable_performance">
                <xsl:for-each select="//song/metadata/notablePerformance">
                    <xsl:value-of select="."/>
                    <xsl:if test="position() != last()">
                        <xsl:text>, </xsl:text>
                    </xsl:if>
                </xsl:for-each>
            </div>
        </xsl:if>
        <xsl:if test="count(//song/metadata/notableEvent) > 0">  
            <div class="notable_event">
                <xsl:for-each select="//song/metadata/notableEvent">
                    <xsl:value-of select="."/>
                    <xsl:if test="position() != last()">
                        <xsl:text>, </xsl:text>
                    </xsl:if>
                </xsl:for-each>
            </div>
        </xsl:if>
    </xsl:template>

    <xsl:template match="title">
        <xsl:apply-templates />
    </xsl:template>

    <xsl:template match="composer">
        <xsl:apply-templates />
    </xsl:template>

    <xsl:template match="album">
        <xsl:apply-templates/>
    </xsl:template>

    <xsl:template match="year">
        <xsl:apply-templates/>
    </xsl:template>

</xsl:stylesheet>
