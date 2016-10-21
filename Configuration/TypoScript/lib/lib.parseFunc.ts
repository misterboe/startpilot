###################
#### PARSEFUNC ####
###################
lib.parseFunc {
    makelinks = 1
    makelinks {
        http {
            keep = path
            extTarget = _blank
        }
        mailto {
            keep = path
        }
    }
    tags {
        link = TEXT
        link {
            current = 1
            typolink {
                parameter {
                    data = parameters : allParams
                }
                extTarget = _blank
            }
            parseFunc.constants = 1
        }
    }
    allowTags := addToList(a, abbr, acronym, address, article, aside, b, bdo)
    allowTags := addToList(big, blockquote, br, caption, center, cite, code, col)
    allowTags := addToList(colgroup, dd, del, dfn, dl, div, dt, em, font)
    allowTags := addToList(footer, header, h1, h2, h3, h4, h5, h6, hr, i, img)
    allowTags := addToList(ins, kbd, label, li, link, meta, nav, ol, p, pre, q)
    allowTags := addToList(samp, sdfield, section, small, span, strike, strong)
    allowTags := addToList(style, sub, sup, table, thead, tbody, tfoot, td, th)
    allowTags := addToList(tr, title, tt, u, ul, var)
    denyTags = *
    sword = <span class="text-highlight">|</span>
    constants = 1
    nonTypoTagStdWrap {
        HTMLparser = 1
        HTMLparser {
            keepNonMatchedTags = 1
            htmlSpecialChars = 2
        }
    }
}


#######################
#### PARSEFUNC RTE ####
#######################
lib.parseFunc_RTE < lib.parseFunc
lib.parseFunc_RTE {
    externalBlocks := addToList(article, aside, blockquote, div, dd, dl, footer)
    externalBlocks := addToList(header, nav, ol, section, table, ul)
    externalBlocks {
        blockquote {
            stripNL = 1
            callRecursive = 1
        }
        ol {
            stripNL = 1
            stdWrap {
                parseFunc = < lib.parseFunc
            }
        }
        ul {
            stripNL = 1
            stdWrap {
                parseFunc = < lib.parseFunc
            }
        }
        table {
            stripNL = 1
            stdWrap {
                HTMLparser = 1
                HTMLparser {
                    tags {
                        table {
                            fixAttrib {
                                class {
                                    default = table
                                    always = 1
                                    list = table
                                }
                            }
                        }
                    }
                    keepNonMatchedTags = 1
                }
                wrap = <div class="table-responsive">|</div>
            }
            HTMLtableCells = 1
            HTMLtableCells {
                default.stdWrap {
                    parseFunc = < lib.parseFunc_RTE
                    parseFunc {
                        nonTypoTagStdWrap {
                            encapsLines {
                                nonWrappedTag =
                            }
                        }
                    }
                }
                addChr10BetweenParagraphs = 1
            }
        }
        div {
            stripNL = 1
            callRecursive = 1
        }
        article < .div
        aside < .div
        footer < .div
        header < .div
        nav < .div
        section < .div
        dl < .div
        dd < .div
    }
    nonTypoTagStdWrap {
        encapsLines {
            encapsTagList = p, pre, h1, h2, h3, h4, h5, h6, hr, dt
            remapTag.DIV = P
            nonWrappedTag = P
            innerStdWrap_all.ifBlank = &nbsp;
        }
    }
    nonTypoTagStdWrap {
        HTMLparser = 1
        HTMLparser {
            keepNonMatchedTags = 1
            htmlSpecialChars = 2
        }
    }
}