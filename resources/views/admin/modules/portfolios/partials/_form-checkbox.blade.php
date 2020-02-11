{{ Form::checkbox('active', 1, $item->active) }}

@push('js')
    <script>
        $(document).ready(function(){
            $("input:checkbox").change(function() {
                $(this).attr('value', this.checked ? 1 : 0);
                let $checkbox = $(this)
                let $status         = $(this).attr('value');
                let $portfolioId    = $(this).closest('td').attr('id');
                let url = '/admin/portfolios/' + $portfolioId + '/status';
                $.ajax({
                    type:'POST',
                    url: url,
                    data: { "portfolio": $portfolioId, "status" : $status },
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
