
plugin.tx_parser_psone {
    view {
        # cat=plugin.tx_parser_psone/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:parser/Resources/Private/Templates/
        # cat=plugin.tx_parser_psone/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:parser/Resources/Private/Partials/
        # cat=plugin.tx_parser_psone/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:parser/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_parser_psone//a; type=string; label=Default storage PID
        storagePid =
    }
}
