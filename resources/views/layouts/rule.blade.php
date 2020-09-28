<div class="main-content">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" defer></script>
    <style>
        .slow .toggle-group {
            transition: left 0.7s;
            -webkit-transition: left 0.7s;
        }
    </style>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Peraturan Kelas</h3>

            </div>
            <div class="card-body">
                <form class="forms-sample" method="post" action="{{route('storerule',$class->id)}}">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tulis aturan secara jelas dan lengkap</label>
                        <textarea id="summernote" name="rule"></textarea>
                        <script>
                            $(document).ready(function() {
                                $('#summernote').summernote({
                                    placeholder: 'Tulis soal di sini',
                                    tabsize: 2,
                                    height: 800,
                                    toolbar: [
                                        ['style', ['style']],
                                        ['font', ['bold', 'underline', 'clear']],
                                        ['fontname', ['fontname']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        ['table', ['table']],
                                        ['insert', ['link']],
                                        ['view', ['fullscreen', 'codeview', 'help']],
                                    ],
                                });
                            });
                            $("#summernote").summernote("pasteHTML","{!!$class->rule!!}")
                        </script>
                    </div>


                    @csrf
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
