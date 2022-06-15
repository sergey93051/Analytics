<div class="col-md-12 mt-5">
   <h4>Posts of Facebook Page</h4>
</div>
<div class="col-md-12 mt-2">
    <table id="ribbonTable" class="display" style="width:100%;">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">message</th>
                <th scope="col">created time</th>
            </tr>
        </thead>
    </table>
</div>
@push('js')
<script src="{{asset("assets/js/fcscript/ribbon.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        ribbon(
            jQuery.parseJSON('<?= "$ribbonData" ?>')
        );
    });
</script>
@endpush
