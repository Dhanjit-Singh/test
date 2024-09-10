<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

{{-- user registration profile image preview using jquery --}}
<script>
    $(document).ready(function() {
        document.getElementById('userRegInput').addEventListener('change', e => {
            const preview = document.getElementById('userRegSrc');
            preview.src = URL.createObjectURL(e.target.files[0]);
        })
    })
</script>
{{-- admin registration profile image preview using jquery  --}}
<script>
    $(document).ready(function() {
        document.getElementById('adminRegInput').addEventListener('change', e => {
            const preview = document.getElementById('adminRegSrc');
            preview.src = URL.createObjectURL(e.target.files[0]);
        })
    })
</script>

{{-- admin side user registration profile image preview using jquery  --}}
<script>
    $(document).ready(function() {
        document.getElementById('userRegInputAdmin').addEventListener('change', e => {
            const preview = document.getElementById('userRegSrcAdmin');
            preview.src = URL.createObjectURL(e.target.files[0]);
        })
    })
</script>

{{-- admin side user update profile image preview using jquery  --}}
<script>
    $(document).ready(function() {
        document.getElementById('userRegInputUp').addEventListener('change', e => {
            const preview = document.getElementById('userRegSrcUp');
            preview.src = URL.createObjectURL(e.target.files[0]);
        })
    })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
</script>
<script>
    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    })
</script>

</body>

</html>
