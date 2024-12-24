<?php include_once('inc/config.php'); ?>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Lexend%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Login to your account</title>
    <!-- <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," /> -->
    <link href="assets/images/favicon.png" rel="icon" type="image">

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style>
      .login{
        transition: background-color 0.2s;
      }
      .login:hover{
        background-color: #0b4499;
      }
      header{
        position: fixed;
        left: 0;
        right: 0;
        z-index: 100;
        background-color: white;
      }
      .header-next{
        margin-top: 35px;
      }
      
    </style>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: Lexend, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f0f2f4] px-10 py-3">
          <div class="flex items-center gap-4 text-[#111418]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12.0799 24L4 19.2479L9.95537 8.75216L18.04 13.4961L18.0446 4H29.9554L29.96 13.4961L38.0446 8.75216L44 19.2479L35.92 24L44 28.7521L38.0446 39.2479L29.96 34.5039L29.9554 44H18.0446L18.04 34.5039L9.95537 39.2479L4 28.7521L12.0799 24Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <h2 class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em]">Computer Science Repository</h2>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a class="text-[#111418] text-sm font-medium leading-normal" href="../index.html">Home</a>
              <a class="text-[#111418] text-sm font-medium leading-normal" href="#">Students</a>
              <a class="text-[#111418] text-sm font-medium leading-normal" href="#">Admin</a>
            </div>
            <div class="flex gap-2">
            
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#1972d2] text-white text-sm font-bold leading-normal tracking-[0.015em] login"
              >
                <span class="truncate">Log in</span>
              </button>
            </div>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5 header-next">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="@container">
              <div class="@[480px]:p-4">
                <h2 class="text-[#111418] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Login to your account</h2>
                <form method="post">
                    <div
                      class="flex min-h-[120px] flex-col gap-6 :gap-3 @[480px]:rounded-xl items-center justify-center p-4 header-next"style='background:none;'>             
                            <label class="flex flex-col min-w-40 h-14 w-full max-w-[480px] @[480px]:h-13 ">
                                <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                                    <div
                                    class="text-[#637588] flex border border-[#dce0e5] bg-white items-center justify-center pl-[15px] rounded-l-xl border-r-0"
                                    data-icon="MagnifyingGlass"
                                    data-size="20px"
                                    data-weight="regular"
                                    >
                                    <svg class="h-8 w-8 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="22" y1="2" x2="11" y2="13" />  <polygon points="22 2 15 22 11 13 2 9 22 2" /></svg>
                                    </div>
                                    <input
                                    name="matriculation_number"
                                    placeholder="enter matricno"
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border border-[#dce0e5] bg-white focus:border-[#dce0e5] h-full placeholder:text-[#637588] px-[15px] rounded-r-none border-r-0 pr-2 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal"
                                    value=""
                                    />
                                    <div class="flex items-center justify-center rounded-r-xl border-l-0 border border-[#dce0e5] bg-white pr-[7px]">
                                   
                                    </div>
                                </div>
                            </label>
                        
                        
                            <label class="flex flex-col min-w-40 h-14 w-full max-w-[480px] @[480px]:h-13 ">
                                <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                                    <div
                                    class="text-[#637588] flex border border-[#dce0e5] bg-white items-center justify-center pl-[15px] rounded-l-xl border-r-0"
                                    data-icon="MagnifyingGlass"
                                    data-size="20px"
                                    data-weight="regular"
                                    >
                                    <svg class="h-8 w-8 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="5" y="11" width="14" height="10" rx="2" />  <circle cx="12" cy="16" r="1" />  <path d="M8 11v-4a4 4 0 0 1 8 0v4" /></svg>
                                    </div>
                                    <input
                                    name="password"
                                    placeholder="enter password"
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border border-[#dce0e5] bg-white focus:border-[#dce0e5] h-full placeholder:text-[#637588] px-[15px] rounded-r-none border-r-0 pr-2 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal"
                                    value=""
                                    />
                                    <div class="flex items-center justify-center rounded-r-xl border-l-0 border border-[#dce0e5] bg-white pr-[7px]">                      
                                    </div>
                                </div>
                            </label>
                            <button type="submit" name="student_login"
                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#1972d2] text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                        >
                            <span class="truncate">Login</span>
                        </button>
                        <h2 class="text-dark text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                            Don't have an account?
                          </h2>
                    </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <?php include_once('inc/footer.php');?>
  </body>
</html>
