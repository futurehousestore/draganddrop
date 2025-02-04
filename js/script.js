document.addEventListener("DOMContentLoaded", function() {
    var dropzone = document.getElementById('dropzone');
    var uploadStatus = document.getElementById('uploadStatus');

    dropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });

    dropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');
    });

    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        var files = e.dataTransfer.files;
        uploadFiles(files);
    });

    function uploadFiles(files) {
        var formData = new FormData();
        for (var i = 0; i < files.length; i++) {
            formData.append('files[]', files[i]);
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'upload.php', true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                uploadStatus.innerHTML = 'Files uploaded successfully.';
            } else {
                uploadStatus.innerHTML = 'An error occurred while uploading the files.';
            }
        };

        xhr.send(formData);
    }
});
