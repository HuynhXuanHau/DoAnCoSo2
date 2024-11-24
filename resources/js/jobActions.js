document.addEventListener("DOMContentLoaded", function () {
    const approveButtons = document.querySelectorAll(".approveJob");
    const rejectButtons = document.querySelectorAll(".rejectJob");

    approveButtons.forEach(button => {
        button.addEventListener("click", function () {
            handleJobAction(button.value, "approve");
        });
    });

    rejectButtons.forEach(button => {
        button.addEventListener("click", function () {
            handleJobAction(button.value, "reject");
        });
    });

    function handleJobAction(jobId, action) {
        const url = action === "approve"
            ? "{{ route('applyJob.approve') }}"
            : "{{ route('applyJob.reject') }}";

        axios.post(url, {
            id: jobId,
            _token: "{{ csrf_token() }}"
        })
        .then(response => {
            if (response.data.success) {
                alert(response.data.message);
                location.reload();
            } else {
                console.error(response.data.message);
                alert("Đã xảy ra lỗi.");
            }
        })
        .catch(error => console.error(error));
    }
});
