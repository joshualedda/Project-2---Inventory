<div id="main">
    <div class="main-container">
<div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Upload Files </li>
                </ol>
            </nav>
        </div>
    </div>

        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('files') ?>" class="btn btn-success">Back</a>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <div class="card">
            <h3 class="card-title mx-4 mt-4">
                Upload File
            </h3>

            <div class="card-body">
                <form action="<?= base_url('files/upload') ?>" method="post" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- File Name -->
                        <div class="col-md-6">
                            <label for="file_name" class="form-label">File Name</label>
                            <input type="text" class="form-control" name="file_name" value="<?= set_value('file_name') ?>">
                            <?= form_error('file_name', '<div class="error text-danger">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label for="file_name" class="form-label">Uploader Name</label>
                            <input readonly type="text" class="form-control" name="file_name" value="<?= set_value('file_name') ?>">
                            <?= form_error('file_name', '<div class="error text-danger">', '</div>') ?>
                        </div>
                        <!-- Department -->
                        <div class="col-md-6">
                            <label for="department_id" class="form-label">Department</label>
                            <select name="department_id" class="form-select">
                                <option selected value="">Choose Department</option>
                                <option value="1">Research</option>
                                <option value="2">Extension</option>
                                <option value="3">AQA</option>
                                <option value="4">Planning</option>
                                <option value="5">OED (Office of the Executive Director)</option>
                            </select>
                            <?= form_error('department_id', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Field Office -->
                        <div class="col-md-6">
                            <label for="field_office" class="form-label">Field Office</label>
                            <select name="field_office" class="form-select">
                                <option selected value="">Choose Field Office</option>
                                <option value="FO1">FO1</option>
                                <option value="FO2">FO2</option>
                                <option value="FO3">FO3</option>
                                <option value="FO4">FO4</option>
                            </select>
                            <?= form_error('field_office', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option selected value="">Choose Category</option>
                                <option value="Reports">Reports</option>
                                <option value="Plans">Plans</option>
                                <option value="Checklist">Checklist</option>
                                <option value="Strategy">Strategy</option>
                                <option value="Memorandum">Memorandum</option>
                                <option value="Study">Study</option>
                            </select>
                            <?= form_error('category', '<div class="error text-danger">', '</div>') ?>
                        </div>


<div class="col-md-6">
    <label for="confidentiality_level" class="form-label">Confidentiality Level</label>
    <select name="confidentiality_level" class="form-select">
        <option selected value="">Choose Confidentiality Level</option>
        <option value="Public">Public</option>
        <option value="Internal">Internal</option>
        <option value="Confidential">Confidential</option>
        <option value="Restricted">Restricted</option>
    </select>
    <?= form_error('confidentiality_level', '<div class="error text-danger">', '</div>') ?>
</div>
                        <!-- File Upload -->
                <div class="col-md-6">
    <label for="document" class="form-label">
        Upload File <i class="text-danger text-xs">(doc, docx, pdf, xlsx, pptx, images)</i>
    </label>
    <input type="file" class="form-control" name="document" id="documentInput" 
           accept=".doc,.docx,.pdf,.xlsx,.pptx,image/*">
    <?= form_error('document', '<div class="error text-danger">', '</div>') ?>

    <!-- Preview Area -->
    <div id="previewArea" class="mt-3"></div>
</div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("documentInput").addEventListener("change", function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById("previewArea");
    preview.innerHTML = "";

    if (!file) return;

    const ext = file.name.split('.').pop().toLowerCase();

    // === Image Preview ===
    if (file.type.startsWith("image/")) {
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file);
        img.style.maxWidth = "150px";
        img.style.maxHeight = "150px";
        img.classList.add("img-thumbnail");
        preview.appendChild(img);
    } 
    // === PDF Preview (embed full file) ===
    else if (ext === "pdf") {
        const fileURL = URL.createObjectURL(file);
        preview.innerHTML = `
            <embed src="${fileURL}" type="application/pdf" width="100%" height="400px" class="border rounded" />
        `;
    } 
    // === Office Docs (icon only) ===
    else if (["doc", "docx", "xls", "xlsx", "ppt", "pptx"].includes(ext)) {
        let icon = "📄"; // default
        if (ext.includes("doc")) icon = "📝 Word Document";
        if (ext.includes("xls")) icon = "📊 Excel Spreadsheet";
        if (ext.includes("ppt")) icon = "📑 PowerPoint Presentation";

        preview.innerHTML = `
            <div class="p-2 border rounded bg-light">
                ${icon} (${file.name})<br>
                <small class="text-muted">(Preview not supported — will be uploaded)</small>
            </div>
        `;
    } 
    // === Fallback for unsupported types ===
    else {
        preview.innerHTML = `
            <div class="p-2 border rounded bg-light">
                📁 ${file.name}<br>
                <small class="text-muted">(No preview available)</small>
            </div>
        `;
    }
});
</script>
