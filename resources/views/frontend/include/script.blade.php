<script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/tiny-slider.js') }}"></script>
<script src="{{ asset('public/frontend/js/custom.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $("#newsletterForm").on("submit", function (e) {
        e.preventDefault();

        let formData = {
            name: $(this).find("input[name='name']").val(),
            email: $(this).find("input[name='email']").val(),
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: "{{ route('newsletter') }}",
            type: "POST",
            data: formData,
            success: function (response) {
                $('#success').html(response.message);
                $("#newsletterForm")[0].reset();
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
            }
        });
    });
</script>
@stack('script-tag')
