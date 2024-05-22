<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes" />

    <xsl:template match="/">
        <html>
            <head>
                <style>
                    .header { margin-top: 10px; margin-right: 50px; }
                    .gear { margin-top: 10px; }
                    .gear-piece { max-height: 70px; border-bottom: 1px solid
                    #ccc; }
                    .description { margin-top: 10px; margin-left: 50px; }
                </style>
            </head>
            <body>
                <div class="header">
                    <b>
                        <xsl:value-of select="/guide/header/title" />
                    </b>
                    <p>Author: <xsl:value-of select='/guide/@author' /></p>
                    <p>Category: <xsl:value-of select="/guide/header/category" /></p>
                    <p>Difficulty: <xsl:choose>
                            <xsl:when test="/guide/header/difficulty/Beginner">Beginner</xsl:when>
                            <xsl:when test="/guide/header/difficulty/Advanced">Advanced</xsl:when>
                            <xsl:when test="/guide/header/difficulty/Pro">Pro</xsl:when>
                        </xsl:choose>
                    </p>
                </div>
                <div class="gear">
                    <b>Gear</b>
                    <xsl:for-each select="/guide/gear/gear_piece">
                        <div class="gear-piece">
                            <p>Type: <xsl:value-of select="@type" /></p>
                            <p>Tier: <xsl:value-of select="@tier" /></p>
                            <p>Name: <xsl:value-of select="." /></p>
                        </div>
                    </xsl:for-each>
                </div>
                <div class="description">
                    <b>Description</b>
                    <p>
                        <xsl:value-of select="/guide/description" />
                    </p>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>