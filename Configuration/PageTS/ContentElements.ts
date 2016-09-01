## Backend preview for ce_textimage ##
mod.web_layout.tt_content.preview.ce_textimage = EXT:startpilot/Resources/Private/Templates/Preview/BE_Textimage.html

mod.wizards {
    newContentElement {
        wizardItems {
            common {
                header = Custom Content Elements
                elements {
                    ce_textimage {
                        icon = EXT:startpilot/ext_icon.svg
                        title = Text with Image
                        description = Image positions: Top, Bottom, Left, Right
                        tt_content_defValues {
                            CType = ce_textimage
                        }
                    }
                }
            }

            common.show = *
        }
    }
}