<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    exclude-result-prefixes="xs"
    version="2.0">
    <xsl:output indent="yes"/>
    <xsl:variable name="startX" select="50"/>
    <xsl:variable name="endX" select="600"/>
    <xsl:variable name="startY" select="400"/>
    <xsl:variable name="endY" select="80"/>   
    <xsl:template match="/">
        <svg width="100%" height="100%" viewBox="0 0 600 630" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg">
            <text x="325" y="40" text-anchor="middle"><xsl:value-of select="song/title" /></text>
            <line x1="{$startX}" y1="{$startY}" x2="{$endX}" y2="{$startY}" style="stroke:rgb(0,0,0);stroke-width:1" />
            <line x1="{$startX}" y1="{$startY}" x2="{$startX}" y2="{$endY}" style="stroke:rgb(0,0,0);stroke-width:1" />
            <xsl:variable name="xText" select="$startX - 20"/>
            <text x="{$xText}" y="400" text-anchor="middle">0%</text>
            <text x="{$xText}" y="250" text-anchor="middle">50%</text>
            <text x="{$xText}" y="100" text-anchor="middle">100%</text>
            <line x1="{$startX}" y1="250" x2="{$endX}" y2="250" style="stroke:rgb(0,0,0);stroke-width:1" stroke-dasharray="8 4" />
            <line x1="{$startX}" y1="100" x2="{$endX}" y2="100" style="stroke:rgb(0,0,0);stroke-width:1" stroke-dasharray="8 4" />
            
            <xsl:variable name="verb" select="song/verbPhrases"/>
            <xsl:variable name="withAdv" select="song/withAdverb div $verb * 100"/>
            <xsl:variable name="negatedVerb" select="song/negatedVerb div $verb * 100"/>
            
            <xsl:variable name="noun" select="song/nounPhrases"/>
            <xsl:variable name="withAdj" select="song/withAdj div $noun * 100"/>
            <xsl:variable name="negatedNoun" select="song/negatedNoun div $noun * 100"/>
            
            <xsl:variable name="yInterval" select="3"/>
            <xsl:variable name="yPos1" select="$startY - $withAdv * $yInterval"/>
            <xsl:variable name="yPos2" select="$startY - $negatedVerb * $yInterval"/>
            <xsl:variable name="yPos3" select="$startY - $withAdj * $yInterval"/>
            <xsl:variable name="yPos4" select="$startY - $negatedNoun * $yInterval"/>
            
            <xsl:variable name="rectWidth" select="100"/>
            
            <xsl:variable name="rectHeight1" select="$startY - $yPos1"/>
            <xsl:variable name="rectHeight2" select="$startY - $yPos2"/>
            <xsl:variable name="rectHeight3" select="$startY - $yPos3"/>
            <xsl:variable name="rectHeight4" select="$startY - $yPos4"/>
            
            <rect x="50" y="{$yPos1}" width="{$rectWidth}" height="{$rectHeight1}" style="fill:blue"/>
            <rect x="200" y="{$yPos2}" width="{$rectWidth}" height="{$rectHeight2}" style="fill:red"/>
            <rect x="350" y="{$yPos3}" width="{$rectWidth}" height="{$rectHeight3}" style="fill:green"/>
            <rect x="500" y="{$yPos4}" width="{$rectWidth}" height="{$rectHeight4}" style="fill:black"/>
            
            <xsl:variable name="label1" select="$startY - $rectHeight1 - 10"/>
            <text x="100" y="{$label1}" text-anchor="middle"><xsl:value-of select="format-number($withAdv, '####0.00')" />%</text>
            <xsl:variable name="label2" select="$startY - $rectHeight2 - 10"/>
            <text x="250" y="{$label2}" text-anchor="middle"><xsl:value-of select="format-number($negatedVerb, '####0.00')" />%</text>
            <xsl:variable name="label3" select="$startY - $rectHeight3 - 10"/>
            <text x="400" y="{$label3}" text-anchor="middle"><xsl:value-of select="format-number($withAdj, '####0.00')" />%</text>
            <xsl:variable name="label4" select="$startY - $rectHeight4 - 10"/>
            <text x="550" y="{$label4}" text-anchor="middle"><xsl:value-of select="format-number($negatedNoun, '####0.00')" />%</text>
            
            
            <text x="50" y="470" text-anchor="left">Legend</text>
            <rect x="50" y="490" width="20" height="20" style="fill:blue"/>
            <text x="100" y="505" text-anchor="left">Verb Phrases with Adverb (% of all verb phrases)</text>
            <rect x="50" y="530" width="20" height="20" style="fill:red"/>
            <text x="100" y="545" text-anchor="left">Negated Verb Phrases (% of all verb phrases)</text>
            <rect x="50" y="570" width="20" height="20" style="fill:green"/>
            <text x="100" y="585" text-anchor="left">Noun Phrases with Adj (% of all noun phrases)</text>
            <rect x="50" y="610" width="20" height="20" style="fill:black"/>
            <text x="100" y="625" text-anchor="left">Negated Noun Phrases (% of all noun phrases)</text>
            
        </svg>
    </xsl:template>
</xsl:stylesheet>