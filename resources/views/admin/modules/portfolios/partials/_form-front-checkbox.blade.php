{{ Form::checkbox('is_front', 1, $item->is_front, ['class' => 'front']) }}

@push('js')
    <script>
        $(document).ready(function(){
            $('input:checkbox[name="is_front"]').change(function() {
                $(this).attr('value', this.checked ? 1 : 0);
                let $checkbox = $(this)
                let $status         = $(this).attr('value');
                let $portfolioId    = $(this).closest('td').attr('class');
                let url = '/admin/portfolios/' + $portfolioId + '/front';
                $.ajax({
                    type:'POST',
                    url: url,
                    data: { "portfolio": $portfolioId, "is_front" : $status },
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    success: function(data){
                        if(data.success) {
                            $checkbox.prop('checked', data.status)
                        }
                    }
                });
            });
        });

    </script>
@endpush
