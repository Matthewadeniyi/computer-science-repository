<?php 
  session_start();
  if (!isset($_SESSION['admin_no'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
    }
include_once('inc/config.php');?>
<html>
  <?php include_once('inc/head.php');?>
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />

  <body>
    <div
      class="relative flex size-full min-h-screen flex-col bg-[#f0f5fa] group/design-root overflow-x-hidden"
      style='--select-button-svg: url(&apos;data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2724px%27 height=%2724px%27 fill=%27rgb(59,110,165)%27 viewBox=%270 0 256 256%27%3e%3cpath d=%27M181.66,170.34a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-48-48a8,8,0,0,1,11.32-11.32L128,212.69l42.34-42.35A8,8,0,0,1,181.66,170.34Zm-96-84.68L128,43.31l42.34,42.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,85.66Z%27%3e%3c/path%3e%3c/svg%3e&apos;); font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'
    >
      <div class="layout-container flex h-full grow flex-col">
      <?php include_once('inc/header.php');?>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <p class="text-[#0b141e] text-4xl font-black leading-tight tracking-[-0.033em] min-w-72">Add a new project</p>
            </div>
            <form enctype="multipart/form-data" method="post">

                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                      <p class="text-[#0b141e] text-base font-medium leading-normal pb-2">Project Title</p>
                      <input
                        name="project_title"
                        placeholder="Enter project title"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border border-[#c7d8eb] bg-[#f0f5fa] focus:border-[#c7d8eb] h-14 placeholder:text-[#3b6ea5] p-[15px] text-base font-normal leading-normal"
                        value=""
                      />
                    </label>
                  </div>
                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                      <p class="text-[#0b141e] text-base font-medium leading-normal pb-2">Student Name</p>
                      <input
                        name="student_name"
                        placeholder="Enter student name"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border border-[#c7d8eb] bg-[#f0f5fa] focus:border-[#c7d8eb] h-14 placeholder:text-[#3b6ea5] p-[15px] text-base font-normal leading-normal"
                        value=""
                      />
                    </label>
                  </div>
                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                      <p class="text-[#0b141e] text-base font-medium leading-normal pb-2">Project year</p>
                      <input
                        name="year"
                        type="number" min="2018" max="<?= date('Y'); ?>" step="1"
                        placeholder="YYYY"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border border-[#c7d8eb] bg-[#f0f5fa] focus:border-[#c7d8eb] h-14 placeholder:text-[#3b6ea5] p-[15px] text-base font-normal leading-normal"
                        value=""
                      />
                    </label>
                  </div>
                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                      <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#1C160C] text-base font-medium leading-normal pb-2">Department</p>
                        <select
                          name="department"
                          class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border border-[#c7d8eb] bg-[#f0f5fa] focus:border-[#c7d8eb] h-14 bg-[image:--select-button-svg] placeholder:text-[#3b6ea5] p-[15px] text-base font-normal leading-normal"                  >
                        <option value=""  selected >Select department</option>
                        <?php
                              $sql = $db->query("SELECT * FROM departments WHERE visible !='0' ");
                              if (!$sql) {
                                  echo "Error: " . $db->error;
                              } elseif (mysqli_num_rows($sql) === 0) {
                                echo "<option value='' disabled>No department found</option>";}
                                else {
                                  $i = 1;
                                  while ($rows = mysqli_fetch_assoc($sql)) {
                                      echo '<option value="' . $rows['sn'] . '">' . $rows['department_name'] . '</option>';
                                  }
                                  $i++;
                              }
                              ?>
                        </select>
                      </label>
                    </div>
                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                      <p class="text-[#0b141e] text-base font-medium leading-normal pb-2">Supervisor</p>
                      <select
                        name="supervisor"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border border-[#c7d8eb] bg-[#f0f5fa] focus:border-[#c7d8eb] h-14 bg-[image:--select-button-svg] placeholder:text-[#3b6ea5] p-[15px] text-base font-normal leading-normal"
                      >
                        <option value="one">Select supervisor</option>
                        <?php
                              $sql = $db->query("SELECT * FROM supervisors");
                              if (!$sql) {
                                  echo "Error: " . $db->error;
                              } elseif (mysqli_num_rows($sql) === 0) {
                                  echo "<option value='' disabled>No supervisors found</option>";
                              } else {
                                  while ($rows = mysqli_fetch_assoc($sql)) {
                                      // Ensure $pro->sqLx returns a string or empty string
                                      $departmentName = $pro->sqLx('departments', 'sn', $rows['sn'], 'department_name');
                                      echo '<option value="' . $rows['sn'] . '">' . $rows['supervisor_name'] .'</option>';
                                  }
                                  $i++;
                              }
                              
                              ?>
                      </select>
                    </label>
                  </div>
                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                      <p class="text-[#0b141e] text-base font-medium leading-normal pb-2">Keywords</p>
                      <textarea
                        name="keyword"
                        placeholder="Enter keywords"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border border-[#c7d8eb] bg-[#f0f5fa] focus:border-[#c7d8eb] min-h-25 placeholder:text-[#3b6ea5] p-[15px] text-base font-normal leading-normal"
                      ></textarea>
                    </label>
                  </div>
                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                      <p class="text-[#0b141e] text-base font-medium leading-normal pb-2">Project Body</p>
                      <textarea
                        name="project_body" id="editor"
                        placeholder="Project Body chapter 1 Max"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border border-[#c7d8eb] bg-[#f0f5fa] focus:border-[#c7d8eb] min-h-25 placeholder:text-[#3b6ea5] p-[15px] text-base font-normal leading-normal"
                      ></textarea>
                    </label>
                  </div>
                  <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                  <label for="file_input" class="flex items-center p-4 gap-3 rounded-lg border border-gray-300 bg-gradient-to-r from-blue-500 to-purple-600 text-white cursor-pointer shadow-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span class="font-semibold">Upload a file</span>
                    <input id="file_input" type="file" class="hidden" name='project_file'>
                  </label>
      
      
                  </div>
                  <div class="flex px-4 py-3 justify-start">
                    <button
                      type = "submit"
                      name="addProject"
                      class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 bg-gradient-to-r from-blue-500 to-purple-600 text-[#f0f5fa] text-base font-bold leading-normal tracking-[0.015em]"
                    >
                      <span class="truncate">Submit</span>
                    </button>
                  </div>
                </div>
            </form>
        </div>
        <footer class="flex justify-center">
          <div class="flex max-w-[960px] flex-1 flex-col">
            <footer class="flex flex-col gap-6 px-5 py-10 text-center @container">
              <div class="flex flex-wrap items-center justify-center gap-6 @[480px]:flex-row @[480px]:justify-around">
                <a class="text-[#3b6ea5] text-base font-normal leading-normal min-w-40" href="#">Privacy Policy</a>
                <a class="text-[#3b6ea5] text-base font-normal leading-normal min-w-40" href="#">Terms of Service</a>
              </div>
              <div class="flex flex-wrap justify-center gap-4">
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="TwitterLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M247.39,68.94A8,8,0,0,0,240,64H209.57A48.66,48.66,0,0,0,168.1,40a46.91,46.91,0,0,0-33.75,13.7A47.9,47.9,0,0,0,120,88v6.09C79.74,83.47,46.81,50.72,46.46,50.37a8,8,0,0,0-13.65,4.92c-4.31,47.79,9.57,79.77,22,98.18a110.93,110.93,0,0,0,21.88,24.2c-15.23,17.53-39.21,26.74-39.47,26.84a8,8,0,0,0-3.85,11.93c.75,1.12,3.75,5.05,11.08,8.72C53.51,229.7,65.48,232,80,232c70.67,0,129.72-54.42,135.75-124.44l29.91-29.9A8,8,0,0,0,247.39,68.94Zm-45,29.41a8,8,0,0,0-2.32,5.14C196,166.58,143.28,216,80,216c-10.56,0-18-1.4-23.22-3.08,11.51-6.25,27.56-17,37.88-32.48A8,8,0,0,0,92,169.08c-.47-.27-43.91-26.34-44-96,16,13,45.25,33.17,78.67,38.79A8,8,0,0,0,136,104V88a32,32,0,0,1,9.6-22.92A30.94,30.94,0,0,1,167.9,56c12.66.16,24.49,7.88,29.44,19.21A8,8,0,0,0,204.67,80h16Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="FacebookLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="LinkedinLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M216,24H40A16,16,0,0,0,24,40V216a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V40A16,16,0,0,0,216,24Zm0,192H40V40H216V216ZM96,112v64a8,8,0,0,1-16,0V112a8,8,0,0,1,16,0Zm88,28v36a8,8,0,0,1-16,0V140a20,20,0,0,0-40,0v36a8,8,0,0,1-16,0V112a8,8,0,0,1,15.79-1.78A36,36,0,0,1,184,140ZM100,84A12,12,0,1,1,88,72,12,12,0,0,1,100,84Z"
                      ></path>
                    </svg>
                  </div>
                </a>
              </div>
              <p class="text-[#3b6ea5] text-base font-normal leading-normal">Copyright 2023 Academic Repository</p>
            </footer>
          </div>
        </footer>
      </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.umd.js"></script>
    <script type="text/javascript">
       const {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph
            } = CKEDITOR;
        ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                } )
                
        </script>
    <?php include_once('inc/footer.php')?>
  </body>
</html>

