@push('scripts')
    <script>
        // -- Select/Unselect Regions
        let selectRegions = $('#selectRegions');
        let clearRegions = $('#clearRegions');

        selectRegions.click(function () {
            //
            $('.regions-checkboxes').prop('checked', true)
            $('.regions-checkboxes:checkbox[value="100"]').prop('checked', false)
        })

        clearRegions.click(function () {
            $('.regions-checkboxes').prop('checked', false)
            $('.regions-checkboxes:checkbox[value="100"]').prop('checked', true)
        })
    </script>

    <script>
        /**
         * pdp_chapter_id onChange
         * no_pdp_indicators onChange
         *
         * Hide/Show indicators group by chapter
         * Uncheck indicators
        */
        let pdpChapters = @json($pdp_chapters->pluck('id')->toArray());

        let pdpChapterId = $('#pdp_chapter_id');

        function toggleVisibleIndicators()
        {
            let selectedPdpChapterId = pdpChapterId.val();
            $.each(pdpChapters, function (chapter) {
                if (parseInt(chapter) !== parseInt(selectedPdpChapterId)) {
                    $('div#pdp_chapter_' + chapter).hide();
                }
            });
            $('div#pdp_chapter_' + selectedPdpChapterId).show();
        }

        pdpChapterId.change(function () {
            // uncheck all checked if the pdp chapter changed
            $('input.pdp_indicators').prop('checked', false)
            toggleVisibleIndicators();
        });

        let noPdpIndicator = $('#no_pdp_indicator');

        function toggleDisableIndicators() {
            console.log(noPdpIndicator.val())
            if (noPdpIndicator.is(':checked')) {
                $('input.pdp_indicators').prop('disabled', true)
            } else {
                $('input.pdp_indicators').prop('disabled', false)
            }
        }

        noPdpIndicator.change(function () {
            toggleDisableIndicators()
        });

        $(document).ready(function () {
            console.log('document is ready')
            // on document ready toggle visible indicators
            toggleVisibleIndicators();
            toggleDisableIndicators()
        });
    </script>
@endpush
