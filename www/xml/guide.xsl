<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes" />

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" />
            </head>
            <body
                class="text-white bg-neutral-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]">
                <div
                    class="header p-4 h-fit shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 mt-5">
                    <b class="text-2xl">
                        <xsl:value-of select="/guide/header/title" />
                    </b>
                    <p class="mt-2">Author: <xsl:value-of select='/guide/@author' /></p>
                    <p class="mt-1">Category: <xsl:choose>
                            <xsl:when test="/guide/header/category/Arena">Arena</xsl:when>
                            <xsl:when test="/guide/header/category/Gathering">Gathering</xsl:when>
                            <xsl:when test="/guide/header/category/PVP">PVP</xsl:when>
                            <xsl:when test="/guide/header/category/PVE">PVE</xsl:when>
                            <xsl:when test="/guide/header/category/Other">Other</xsl:when>
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
                    <b class='text-3xl font-extralight justify-center flex'>Gear</b>
                    <xsl:for-each select="/guide/gear/gear_piece">
                        <div
                            class="gear-piece p-2 mt-4 shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50">
                            <p class="text-sm">Type: <xsl:value-of select="@type" /></p>
                            <p class="text-sm">Tier: <xsl:value-of select="@tier" /></p>
                            <p class="text-lg">Name: <xsl:value-of select="." /></p>
                        </div>
                    </xsl:for-each>
                </div>
                <div
                    class="description p-4 shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 h-fit mt-5">
                    <b class='text-2xl'>Description</b>
                    <p class="mt-2">
                        <xsl:value-of select="/guide/description" />
                    </p>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>