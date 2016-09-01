## Backend preview for ce_startpilot ##
mod.web_layout.tt_content.preview.ce_startpilot = EXT:startpilot/Resources/Private/Templates/Preview/Ce_prev_startpilot.html

mod.wizards {
    newContentElement {
        wizardItems {
            common {
                header = Startpilot CE's
                elements {
                    ce_startpilot {
                        icon = EXT:startpilot/ext_icon.svg
                        title = Startpilot Element
                        description = Demo Element for Startpilot
                        tt_content_defValues {
                            CType = ce_startpilot
                        }
                    }
                }
            }

            common.show = *
        }
    }
}