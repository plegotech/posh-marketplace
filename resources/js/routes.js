import AdminDashboard from './components/admin/Dashboard';
import AdminDashboardLayout from './components/layouts/AdminDashboard';
import AdminManageVendors from './components/admin/ManageVendors';
import AdminManageSellers from './components/admin/ManageSellers';
import AdminPendingVendorSignups from './components/admin/PendingVendorSignups';
import AdminPendingSellerSignups from './components/admin/PendingSellerSignups';
import AdminManageUsers from './components/admin/ManageUsers';
import AdminSellerOrders from './components/admin/SellerOrders';
import AdminVendorOrders from './components/admin/VendorOrders';
import AdminPaymentDetails from './components/admin/PaymentDetails';
import AdminPaymentHistory from './components/admin/PaymentHistory';
import AdminSellerReports from './components/admin/SellerReports';
import AdminVendorReports from './components/admin/VendorReports';


import UserLogin from './components/user/LoginUser';
import AdminLogin from './components/user/LoginAdmin';
import ResetPassword from './components/user/ResetPassword';
import SellerLogin from './components/user/LoginSeller';
import VendorLogin from './components/user/LoginVendor';
import VendorSignup from './components/vendor/Signup';
import SellerSignup from './components/seller/Signup';
import SellerSignupTier from './components/seller/SignupTier';
import SellerSignupDomain from './components/seller/SignupDomainInfo';
import SellerSignupFinal from './components/seller/SignupFinal';
import UserSignup from './components/user/UserSignup';
import ForbiddenAccess from './components/user/ForbiddenAccess';
import UserProfile from  './components/user/MyProfile';
import ManageProducts from  './components/user/ManageProducts';


import SellerDashboardLayout from './components/layouts/SellerDashboard';
import SellerOrders from './components/seller/MyOrders';
import Categories from './components/vendor/Categories';
import SubCategories from './components/vendor/SubCategories';
import EditCategories from './components/vendor/EditCategories';
import EditSubCategories from './components/vendor/EditSubCategories';
import Headerfooter from './components/seller/Headerfooter';
import Categoryimages from './components/seller/ManageCategoriesImages';
import ManagePages from './components/seller/ManagePages';

import VendorProductsSeller from  './components/seller/VendorProducts';
import SellerBilling from  './components/seller/Billing';
import SellerManageWebsite from  './components/seller/ManageWebsite';
import SellerSales from  './components/seller/MySales';
import Sliders from  './components/seller/Sliders';
import Promotion from  './components/seller/Promotions';
import AboutUs from  './components/seller/AboutUs';


import VendorDashboardLayout from './components/layouts/VendorDashboard';
import UserDashboard from './components/user/Dashboard';
import VendorUploadProducts from  './components/vendor/UploadProducts';
import VendorOrdersPending from  './components/vendor/PendingOrders';
import VendorOrdersInProgress from  './components/vendor/OrdersInProgress';
import VendorCompletedOrders from './components/vendor/CompletedOrders';
import VendorBilling from  './components/vendor/Billing';
import VendorShipping from  './components/vendor/Shipping';
import VendorEditProducts from  './components/vendor/EditProducts';
import VendorProductHistory from  './components/vendor/ProductHistory';

export default {
    mode: 'history',

    routes: [
        /*
         * Routes for the Super Admin
         */
        { name: 'dashboardLayout', meta: { middleware:"auth" }, path: '/admin', component: AdminDashboardLayout, children: [
            { name: 'dashboard', meta: { title: 'Overview' }, path: '/admin/dashboard', component: AdminDashboard },
            { meta: { title: 'Manage Vendors' }, path: '/admin/manage-vendors', component: AdminManageVendors },
            { meta: { title: 'Manage Sellers' }, path: '/admin/manage-sellers', component: AdminManageSellers },
            { meta: { title: 'Pending Vendor Signups' }, path: '/admin/pending-vendor-signups', component: AdminPendingVendorSignups },
            { meta: { title: 'Pending Seller Signups' }, path: '/admin/pending-seller-signups', component: AdminPendingSellerSignups },
            { meta: { title: 'Manage Users' }, path: '/admin/manage-users', component: AdminManageUsers },
            { meta: { title: 'Orders' }, path: '/admin/orders', component: AdminSellerOrders },
            { meta: { title: 'Seller Orders' }, path: '/admin/seller-orders', component: AdminSellerOrders },
            { meta: { title: 'Vendor Orders' }, path: '/admin/vendor-orders', component: AdminVendorOrders },
            { meta: { title: 'Payment Details' }, path: '/admin/payment-details', component: AdminPaymentDetails },
            { meta: { title: 'Payment History' }, path: '/admin/payment-history', component: AdminPaymentHistory },
            { meta: { title: 'Seller Reports' }, path: '/admin/seller-reports', component: AdminSellerReports },
            { meta: { title: 'Vendor Reports' }, path: '/admin/vendor-reports', component: AdminVendorReports },
        ]},

        // Seller Dashboard
        { name: 'sellerLayout', meta: { middleware:"auth" }, path: '/seller', component: SellerDashboardLayout, children: [
            { name: 'seller-dashboard', meta: { title: 'Overview' }, path: '/seller/dashboard', component: UserDashboard },
            { name: 'seller-manage-products', meta: { title: 'Manage Products' }, path: '/seller/manage/products', component: ManageProducts },
            { name: 'seller-order', meta: { title: 'My Orders' }, path: '/seller/orders', component: SellerOrders },
            { name: 'seller-headerfooter', meta: { title: 'Headerfooter' }, path: '/seller/headerfooter', component: Headerfooter },
            { name: 'seller-vendor-products', meta: { title: 'Vendor Products' }, path: '/seller/vendor-products', component: VendorProductsSeller },
            { name: 'seller-billing', meta: { title: 'Billing' }, path: '/seller/billing', component: SellerBilling },
            { name: 'seller-manage-website', meta: { title: 'Manage Website' }, path: '/seller/manage-website', component: SellerManageWebsite },
            { name: 'seller-sales', meta: { title: 'Sales' }, path: '/seller/sales', component: SellerSales },
            { name: 'seller-categoryimages', meta: { title: 'Category Images' }, path: '/seller/Categoryimages', component: Categoryimages },
            { name: 'seller-managepages', meta: { title: 'Manage Pages' }, path: '/seller/ManagePages', component: ManagePages },
            { name: 'seller-sliders', meta: { title: 'Sliders' }, path: '/seller/Sliders', component: Sliders },
            { name: 'seller-promotion', meta: { title: 'Promotion' }, path: '/seller/Promotion', component: Promotion },
            { name: 'seller-aboutus', meta: { title: 'AboutUs' }, path: '/seller/AboutUs', component: AboutUs },
            { name: 'seller-profile', meta: { title: 'Profile' }, path: '/seller/profile', component: UserProfile }
        ]},

        // Vendor Dashboard
        { name: 'vendorLayout', meta: { middleware:"auth" }, path: '/vendor', component: VendorDashboardLayout, children: [
            { name: 'vendor-dashboard', meta: { title: 'Overview' }, path: '/vendor/dashboard', component: UserDashboard },
            { name: 'vendor-manage-products', meta: { title: 'Manage Products' }, path: '/vendor/manage/products', component: ManageProducts },
            { name: 'vendor-billing', meta: { title: 'Billing' }, path: '/vendor/billing', component: VendorBilling },
            { name: 'vendor-upload-products', meta: { title: 'Upload Products' }, path: '/vendor/upload/products/:product_id?', component: VendorUploadProducts },
            { name: 'vendor-categories', meta: { title: 'Categories' }, path: '/vendor/categories', component: Categories },
            
            
            { name: 'vendor-subcategories', meta: { title: 'Sub Categories' }, path: '/vendor/subcategories', component: SubCategories },
            { name: 'vendor-editcategories',props: true, meta: { title: 'Edit Categories' }, path: '/vendor/editcategories/:id?', component: EditCategories },
            
            
            { name: 'vendor-editsubcategories',props: true, meta: { title: 'Edit Sub Categories' }, path: '/vendor/editsubcategories/:id?', component: EditSubCategories },
            { name: 'vendor-orders-pending', meta: { title: 'Pending Orders' }, path: '/vendor/orders/pending', component: VendorOrdersPending },
            { name: 'vendor-orders-in-progress', meta: { title: 'Orders in Progress' }, path: '/vendor/orders/in-progress', component: VendorOrdersInProgress },
            { name: 'vendor-all-orders', meta: { title: 'Completed Orders' }, path: '/vendor/orders/completed', component: VendorCompletedOrders },
            { name: 'vendor-shipping', meta: { title: 'Shipping' }, path: '/vendor/shipping', component: VendorShipping },
            { name: 'vendor-profile', meta: { title: 'Profile' }, path: '/vendor/profile', component: UserProfile },
            { name: 'vendor-product-history', meta: { title: 'Product History' }, path: '/vendor/product/history', component: VendorProductHistory },
            { name: 'vendor-edit-products', meta: { title: 'Edit Products' }, path: '/vendor/edit/products', component: VendorEditProducts }
        ]},

        /*
         * Non Secure Routes
         */

        { name: 'login-user', meta: { title: 'Login', middleware:'guest' }, path: '/', component: UserLogin },
        { name: 'reset-password', meta: { title: 'Reset Password', middleware:'guest' }, path: '/reset-password', component: ResetPassword },
        { name: 'login', meta: { title: 'Admin Login', middleware:'guest' }, path: '/', component: AdminLogin },
        { name: 'login-seller', meta: { title: 'Seller Login', middleware:'guest' }, path: '/seller-login', component: SellerLogin },
        { name: 'login-vendor', meta: { title: 'Vendor Login', middleware:'guest' }, path: '/vendor-login', component: VendorLogin },
        { name: 'vendor-signup', meta: { title: 'Vendor Signup', middleware:'guest' }, path: '/vendor-signup', component: VendorSignup },
        { name: 'seller-signup', meta: { title: 'Seller Signup' }, path: '/seller/signup/:user_id?', component: SellerSignup },
        { name: 'seller-signup-tier', meta: { title: 'Seller Signup' }, path: '/seller/signup/select-tier/:user_id', component: SellerSignupTier },
        { name: 'seller-signup-domain', meta: { title: 'Seller Signup' }, path: '/seller/signup/select-domain/:user_id', component: SellerSignupDomain },
        { name: 'seller-final', meta: { title: 'Seller Signup' }, path: '/seller/signup/select-template/:user_id', component: SellerSignupFinal },
        { meta: { title: 'User Signup' }, path: '/user-signup', component: UserSignup },
        { name: 'forbidden', meta: { title: 'Forbidden Access' }, path: '/forbidden', component: ForbiddenAccess }
    ]
}
