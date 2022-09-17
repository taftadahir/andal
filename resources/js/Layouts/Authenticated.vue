<script setup>
    import {ref} from "vue";
    import BreezeApplicationLogo from "@/Icons/ApplicationLogo.vue";
    import {Link} from "@inertiajs/inertia-vue3";
    import Grid from "@/Icons/Grid.vue";
    import PieChart from "@/Icons/PieChart.vue";
    import People from "@/Icons/People.vue";
    import MenuArrow from "@/Icons/MenuArrow.vue";
    import Copy from "@/Icons/Copy.vue";
    import Battery from "@/Icons/Battery.vue";
    import Tag from "@/Icons/Tag.vue";
    import At from "@/Icons/At.vue";
    import Setting from "@/Icons/Setting.vue";
    import Logout from "@/Icons/Logout.vue";
    import Search from "@/Icons/Search.vue";
    import Input from "@/Components/Dashboard/Input.vue";
    import SidebarLink from "@/Components/Dashboard/SidebarLink.vue";
    import Person from "@/Icons/Person.vue";
    import Bell from "@/Icons/Bell.vue";
    import Globe from "@/Icons/Globe.vue";
    import FlashMessage from "@/Components/Dashboard/FlashMessage.vue";
    import Bulb from "@/Icons/Bulb.vue";
    
    const showingSidebarTitle = ref(false);
    
    function switchTheme() {
      document.documentElement.classList.toggle('dark');
    }
    </script>
    
    <template>
      <div class="h-screen flex flex-row">
        <div class="flex flex-col justify-between items-start py-4 px-12 max-w-fit">
          <!-- App logo -->
          <div>
            <Link href="/">
              <BreezeApplicationLogo/>
            </Link>
          </div>
    
          <!-- Sidebar menu -->
          <div class="flex flex-col items-start space-y-6 py-20">
            <!-- Dashboard -->
            <SidebarLink
                :active="route().current('dashboard')"
                :href="route('dashboard')"
                :show-title="showingSidebarTitle">
              <template #title>
                Dashboard
              </template>
    
              <Grid/>
            </SidebarLink>
    
            <!-- Analytic -->
            <SidebarLink
                :active="false"
                :href="route('login')"
                :show-title="showingSidebarTitle">
              <template #title>
                Analytic
              </template>
    
              <PieChart/>
            </SidebarLink>
    
            <!-- User -->
            <SidebarLink
                :active="false"
                :href="route('login')"
                :show-title="showingSidebarTitle">
              <template #title>
                User
              </template>
    
              <People/>
            </SidebarLink>
    
            <!-- Topic -->
            <!-- TODO: Should redirect to list of topics -->
            <SidebarLink
                :active="false"
                :href="route('topics.create')"
                :show-title="showingSidebarTitle">
              <template #title>
                Topic
              </template>
    
              <MenuArrow/>
            </SidebarLink>
    
            <!-- Category -->
            <!-- TODO: Should redirect to list of categories -->
            <SidebarLink
                :active="route().current('categories.create')"
                :href="route('categories.create')"
                :show-title="showingSidebarTitle">
              <template #title>
                Category
              </template>
    
              <Copy/>
            </SidebarLink>
    
            <!-- Article -->
            <!-- TODO: Should redirect to list of languages -->
            <SidebarLink
                :active="route().current('articles.create')"
                :href="route('articles.create')"
                :show-title="showingSidebarTitle">
              <template #title>
                Article
              </template>
    
              <Battery/>
            </SidebarLink>
    
            <!-- Tag -->
            <SidebarLink
                :active="false"
                :href="route('login')"
                :show-title="showingSidebarTitle">
              <template #title>
                Tag
              </template>
    
              <Tag/>
            </SidebarLink>
    
            <!-- Newsletter -->
            <SidebarLink
                :active="false"
                :href="route('login')"
                :show-title="showingSidebarTitle">
              <template #title>
                Newsletter
              </template>
    
              <At/>
            </SidebarLink>
    
            <!-- Language -->
            <!-- TODO: Should redirect to list of languages -->
            <SidebarLink
                :active="route().current('languages.create')"
                :href="route('languages.create')"
                :show-title="showingSidebarTitle">
              <template #title>
                Languages
              </template>
    
              <Globe/>
            </SidebarLink>
    
            <!-- Setting -->
            <SidebarLink
                :active="false"
                :href="route('login')"
                :show-title="showingSidebarTitle">
              <template #title>
                Setting
              </template>
    
              <Setting/>
            </SidebarLink>
          </div>
    
          <!-- Logout -->
          <div>
            <SidebarLink
                :active="false"
                :href="route('logout')"
                :logout="true"
                :show-title="showingSidebarTitle"
                as="button" method="post">
              <template #title>
                Logout
              </template>
    
              <Logout/>
            </SidebarLink>
          </div>
        </div>
    
        <div class="flex flex-col w-full">
          <!-- Header -->
          <div class="h-20 px-5 flex flex-row justify-between items-center">
            <!-- Search -->
            <div class="flex items-center ">
              <Search/>
              <Input placeholder="Type to search"/>
            </div>
    
            <div class="flex flex-row items-center space-x-6">
              <!-- Notification -->
              <div class="text-xs font-normal text-gray-500">You have <span class="text-orange-500 px-0.5">3</span> new
                notifications
              </div>
              <Link :href="route('login')">
                <Bell
                    class="transition duration-150 ease-in-out fill-gray-500 dark:fill-gray-500 hover:fill-blue-500 hover:dark:fill-blue-500"/>
              </Link>
    
              <!-- User -->
              <Link :href="route('login')">
                <Person
                    class="transition duration-150 ease-in-out fill-gray-500 dark:fill-gray-500 hover:fill-blue-500 hover:dark:fill-blue-500"/>
              </Link>
    
              <!-- Switch theme -->
              <button @click="switchTheme">
                <Bulb
                    class="transition duration-150 ease-in-out fill-gray-500 dark:fill-gray-500 hover:fill-blue-500 hover:dark:fill-blue-500"/>
              </button>
            </div>
          </div>
    
          <!-- Content -->
          <div class="h-full flex flex-col justify-between text-white-500">
            <!-- Flash message -->
            <div class="my-2 h-28 flex flex-row justify-end items-center">
              <FlashMessage v-if="$page.props.flash.success" :body="$page.props.flash.success" type="success"/>
              <FlashMessage v-if="$page.props.flash.info" :body="$page.props.flash.info" type="info"/>
              <FlashMessage v-if="$page.props.flash.warning" :body="$page.props.flash.warning" type="warning"/>
              <FlashMessage v-if="$page.props.flash.error" :body="$page.props.flash.error" type="error"/>
            </div>
    
            <!-- Body -->
            <div class="mx-auto w-full h-full max-w-208 max-h-152 flex flex-col">
              <div class="flex flex-row justify-between items-center mb-10">
                <slot name="bodyHeader"/>
              </div>
    
              <div class="overflow-y-auto no-scrollbar">
                <slot/>
              </div>
            </div>
    
            <!-- Pagination -->
            <div class="my-4">
              <slot name="contentFooter"/>
            </div>
          </div>
        </div>
      </div>
    </template>