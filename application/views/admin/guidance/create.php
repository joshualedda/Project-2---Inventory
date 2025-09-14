<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Individual Inventory</li>
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
                Guidance Office | Individua Inventory | Senior High School
            </h3>

            <div class="card-body">
                <form action="<?= base_url('student/store') ?>" method="POST">
                    <div class="row g-3">





                        <!-- Date of Birth -->
                        <div class="col-md-4">
                            <label for="dob" class="form-label">School Year</label>
                            <input type="text" class="form-control" name="dob" value="<?= set_value('dob') ?>">
                            <?= form_error('dob', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <div class="col-md-4">
                            <label for="dob" class="form-label">Semester</label>
                            <input type="text" class="form-control" name="dob" value="<?= set_value('dob') ?>">
                            <?= form_error('dob', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <?= form_error('gender', '<div class="error text-danger">', '</div>') ?>
                        </div>



                        <div class="col-md-4">
                            <label for="dob" class="form-label">If TRANSFEREE write previous school</label>
                            <input type="text" class="form-control" name="dob" value="<?= set_value('dob') ?>">
                            <?= form_error('dob', '<div class="error text-danger">', '</div>') ?>
                        </div>



                        <div class="col-md-4">
                            <label for="dob" class="form-label">Why did you transfer?</label>
                            <input type="text" class="form-control" name="dob" value="<?= set_value('dob') ?>">
                            <?= form_error('dob', '<div class="error text-danger">', '</div>') ?>
                        </div>



                        <h3 class="card-title  mt-4">
                            Personal Data
                        </h3>


                        <!-- First Name -->
                        <div class="col-md-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="<?= set_value('first_name') ?>">
                            <?= form_error('first_name', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Middle Name -->
                        <div class="col-md-4">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="<?= set_value('middle_name') ?>">
                            <?= form_error('middle_name', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="<?= set_value('last_name') ?>">
                            <?= form_error('last_name', '<div class="error text-danger">', '</div>') ?>
                        </div>



                        <!-- Gender -->
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Strand</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <?= form_error('gender', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-4">
                            <label for="gender" class="form-label">Grade</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <?= form_error('gender', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <!-- Permanent Address -->
                        <div class="col-md-4">
                            <label for="section" class="form-label">Permanent Address</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <div class="col-md-4">
                            <label for="section" class="form-label">Permanent Address Contact No.</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <div class="col-md-4">
                            <label for="section" class="form-label">Residential Address</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <div class="col-md-4">
                            <label for="section" class="form-label">Residentia Address Contact No.</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-4">
                            <label for="section" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <div class="col-md-4">
                            <label for="section" class="form-label">Date of Birth</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>



                        <div class="col-md-4">
                            <label for="gender" class="form-label">Are you living with your parents</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Choice</option>
                                <option value="Male">Yes</option>
                                <option value="Other">No</option>
                            </select>
                            <?= form_error('gender', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-4">
                            <label for="section" class="form-label">If not, why?</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-4">
                            <label for="section" class="form-label">Boarding House Address</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-4">
                            <label for="section" class="form-label">Name of Landlord/Landlady</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-4">
                            <label for="section" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="section" value="<?= set_value('section') ?>">
                            <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
                        </div>






                        <h3 class="card-title  mt-4">
                            Family Background
                        </h3>

                        <hr>
                        <h5 class="card-title px-2">Family Background</h6>
                            <h6>Father</h6>



                            <div class="col-md-4">
                                <label class="form-label">
                                    Name<font color="red">*</font>
                                </label>
                                <input class="form-control" name="father_name" required />

                            </div>



                            <div class="col-md-4">
                                <label class="form-label">
                                    Age<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="father_age" type="number" required />

                            </div>


                            <div class="col-md-4">
                                <label class="form-label">
                                    Occupation<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="father_occupation" required />

                            </div>

                            <div class="col-md-4">

                                <label class="form-label">
                                    Contact No.<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="father_contact" type="number" required id="contactInput2" />

                                <span class="text-sm text-danger" id="contact-warning2"></span>

                            </div>


                            <div class="col-md-4">
                                <label class="form-label">
                                    Office Contact No.
                                </label>
                                <input class="form-control" name="father_office_contact" type="number" id="contactInput3" />
                                <span class="text-sm text-danger" id="contact-warning3"></span>


                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    Monthly Income
                                </label>
                                <input class="form-control" type="number" name="father_monthly_income" />

                            </div>

                            <div class="col-md-4">
                                <label class="form-label">
                                    Place of Birth
                                </label>
                                <input name="father_birth_place" class="form-control" placeholder="City/Munipality, Province" />

                            </div>
                            <div class="col-md-4">

                                <label class="form-label">
                                    Place of Work
                                </label>
                                <input name="father_work_address" class="form-control" placeholder="City/Munipality, Province" />

                            </div>
                            <hr>
                            <h6>Mother</h6>



                            <div class="col-md-4">
                                <label class="form-label">
                                    Name<font color="red">*</font>
                                </label>
                                <input class="form-control" name="mother_name" required />

                            </div>



                            <div class="col-md-4">
                                <label class="form-label">
                                    Age<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="mother_age" type="number" required />

                            </div>


                            <div class="col-md-4">
                                <label class="form-label">
                                    Occupation<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="mother_occupation" required />

                            </div>

                            <div class="col-md-4">

                                <label class="form-label">
                                    Contact No.<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="mother_contact" type="number" required id="contactInput4" />
                                <span class="text-sm text-danger" id="contact-warning4"></span>


                            </div>


                            <div class="col-md-4">
                                <label class="form-label">
                                    Office Contact No.
                                </label>
                                <input class="form-control" name="mother_office_contact" type="number" id="contactInput5" />
                                <span class="text-sm text-danger" id="contact-warning5"></span>


                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    Monthly Income
                                </label>
                                <input class="form-control" type="number" name="mother_monthly_income" />

                            </div>

                            <div class="col-md-4">
                                <label class="form-label">
                                    Place of Birth
                                </label>
                                <input class="form-control" name="mother_birth_place" placeholder="City/Munipality, Province" placeholder="City/Munipality, Province" />

                            </div>
                            <div class="col-md-4">

                                <label class="form-label">
                                    Place of Work
                                </label>
                                <input class="form-control" name="mother_work_address" placeholder="City/Munipality, Province" />

                            </div>


                            <h6>Name of Siblings </h6>
                            <?php for ($i = 0; $i < 3; $i++) : ?>
                                <div class="col-md-4">
                                    <label class="form-label">Name of Siblings</label>
                                    <input class="form-control" type="text" name="siblings[<?= $i ?>][sibling_name]" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Educational Attainment</label>
                                    <input class="form-control" type="number" name="siblings[<?= $i ?>][sibling_age]" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Occupation</label>
                                    <input class="form-control" type="text" name="siblings[<?= $i ?>][sibling_year]" placeholder="Example: Grade: 9 Sun" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Contact Number</label>
                                    <input class="form-control" type="text" name="siblings[<?= $i ?>][sibling_year]" placeholder="Example: Grade: 9 Sun" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" type="text" name="siblings[<?= $i ?>][sibling_year]" placeholder="Example: Grade: 9 Sun" />
                                </div>
                            <?php endfor; ?>
                            <hr>

                            <h3 class="card-title  mt-4">
                                Income
                            </h3>

                            <div class="col-md-4">
                                <label for="scholarship" class="form-label">Family Income</label>
                                <select name="scholarship" class="form-select">
                                    <option value="">None</option>
                                    <option value="Academic">Academic</option>
                                    <option value="Athletic">Athletic</option>
                                    <option value="Financial Aid">Financial Aid</option>
                                </select>
                                <?= form_error('scholarship', '<div class="error text-danger">', '</div>') ?>
                            </div>


                            <!-- School Year -->
                            <div class="col-md-4">
                                <label for="school_year" class="form-label">Who Support the family?</label>
                                <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year') ?>" placeholder="e.g. 2024-2025">
                                <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
                            </div>

                            <div class="col-md-4">
                                <label for="school_year" class="form-label">Source of Income</label>
                                <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year') ?>" placeholder="e.g. 2024-2025">
                                <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
                            </div>



                            <div class="col-md-4">
                                <label for="scholarship" class="form-label">Are you a scholar?</label>
                                <select name="scholarship" class="form-select">
                                    <option value="">None</option>
                                    <option value="Athletic">Yes</option>
                                    <option value="Financial Aid">No</option>
                                </select>
                                <?= form_error('scholarship', '<div class="error text-danger">', '</div>') ?>
                            </div>


                            <div class="col-md-4">
                                <label for="school_year" class="form-label">If yes, What Scholarship</label>
                                <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year') ?>" placeholder="e.g. 2024-2025">
                                <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
                            </div>


                            <div class="col-md-4">
                                <label for="scholarship" class="form-label">Are you a working student?</label>
                                <select name="scholarship" class="form-select">
                                    <option value="">None</option>
                                    <option value="Athletic">Yes</option>
                                    <option value="Financial Aid">No</option>
                                </select>
                                <?= form_error('scholarship', '<div class="error text-danger">', '</div>') ?>
                            </div>


                            <div class="col-md-4">
                                <label for="school_year" class="form-label">If yes, Where?</label>
                                <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year') ?>" placeholder="e.g. 2024-2025">
                                <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
                            </div>





                            <!-- Educational Background -->

                            <h5 class="card-title px-2">
                                Educational Background
                            </h5>

                            <div class="row">

                                <div class="col-md-4">
                                    <h6>
                                        Kinder
                                    </h6>
                                    <div class="relative mb-3">
                                        <label>Year</label>
                                        <input class="form-control" name="school_name7" />
                                    </div>
                                    <div class="relative mb-3">
                                        <label>Schools</label>
                                        <input class="form-control" name="school_section7" />
                                    </div>
                                    <div class="relative mb-3">
                                        <label>Awards Received</label>
                                        <input type="text" class="form-control" name="school_year7" placeholder="2022-2023" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h6>
                                        Elementary
                                    </h6>
                                    <div class="relative mb-3">
                                        <label>Year</label>
                                        <input class="form-control" name="school_name8" />
                                    </div>
                                    <div class="relative mb-3">
                                        <label>Schools</label>
                                        <input class="form-control" name="school_section8" />
                                    </div>
                                    <div class="relative mb-3">
                                        <label>Awards Received</label>
                                        <input type="text" class="form-control" name="school_year8" placeholder="2022-2023" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h6>
                                        Secondary
                                    </h6>
                                    <div class="relative mb-3">
                                        <label>Year</label>
                                        <input class="form-control" name="school_name9" />
                                    </div>
                                    <div class="relative mb-3">
                                        <label>Schools</label>
                                        <input class="form-control" name="school_section9" />
                                    </div>
                                    <div class="relative mb-3">
                                        <label>Awards Received</label>
                                        <input type="text" class="form-control" name="school_year9" placeholder="2022-2023" />
                                    </div>
                                </div>
                            </div>





                            <h3 class="card-title  mt-4">
                                Skills, Talents and Interests
                            </h3>

                            <h6>
                                What are your talents and interest? (Pls. Specify. Examples: Reading, Drawing, Dancing, Singing)<span class="text-danger">*</span>
                            </h6>

                            <!-- School Year -->
                            <div class="col-md-4">
                                <label for="school_year" class="form-label">Talent</label>
                                <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year') ?>">
                                <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
                            </div>

                            <div class="col-md-4">
                                <label for="school_year" class="form-label">Skills</label>
                                <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year') ?>">
                                <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
                            </div>

                            <div class="col-md-4">
                                <label for="school_year" class="form-label">Sports</label>
                                <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year') ?>">
                                <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
                            </div>













                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
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