<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes" />

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" />
            </head>
            <body class="bg-gray-900 text-white">
                <div class="header p-4 rounded shadow-md h-fit bg-zinc-700 mt-5">
                    <b class="text-2xl">
                        <xsl:value-of select="/guide/header/title" />
                    </b>
                    <p class="mt-2">Author: <xsl:value-of select='/guide/@author' /></p>
                    <p class="mt-1">Category: <xsl:choose>
                            <xsl:when test="/guide/header/difficulty/Arena">Arena</xsl:when>
                            <xsl:when test="/guide/header/difficulty/Gathering">Gathering</xsl:when>
                            <xsl:when test="/guide/header/difficulty/PVP">PVP</xsl:when>
                            <xsl:when test="/guide/header/difficulty/PVE">PVE</xsl:when>
                            <xsl:when test="/guide/header/difficulty/Other">Other</xsl:when>
                        </xsl:choose>
                    </p>
                    <p class="mt-1">Difficulty: <xsl:choose>
                            <xsl:when test="/guide/header/difficulty/Beginner">Beginner</xsl:when>
                            <xsl:when test="/guide/header/difficulty/Advanced">Advanced</xsl:when>
                            <xsl:when test="/guide/header/difficulty/Pro">Pro</xsl:when>
                        </xsl:choose>
                    </p>
                </div>
                <div class="gear p-4">
                    <b class='text-2xl justify-center flex'>Gear</b>
                    <xsl:for-each select="/guide/gear/gear_piece">
                        <div class="gear-piece p-2 mt-4 rounded shadow-md bg-zinc-700">
                            <p class="text-sm">Type: <xsl:value-of select="@type" /></p>
                            <p class="text-sm">Tier: <xsl:value-of select="@tier" /></p>
                            <p class="text-lg">Name: <xsl:value-of select="." /></p>
                        </div>
                    </xsl:for-each>
                </div>
                <div class="description p-4 rounded shadow-md h-fit bg-zinc-700 mt-5">
                    <b class='text-2xl'>Description</b>
                    <p class="mt-2">
                        <xsl:value-of select="/guide/description" />
                    </p>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>