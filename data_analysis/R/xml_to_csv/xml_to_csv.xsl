<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format" >
    <xsl:output method="text" omit-xml-declaration="yes" indent="no"/>
    <xsl:template match="/">
        id,protest,verbPhrases,withAdverb,negatedVerb,nounPhrases,withAdj,negatedNoun
        <xsl:for-each select="//song">
            <xsl:value-of select="concat(position(),',',protest,',',verbPhrases,',',withAdverb,',',negatedVerb,',',nounPhrases,',',withAdj,',',negatedNoun,'&#xA;')"/>
        </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>