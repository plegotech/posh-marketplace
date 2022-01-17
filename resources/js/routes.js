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
import UserLogin from './components/user/Login';
import VendorSignup from './components/vendor/Signup';
import SellerSignup from './components/seller/Signup';
import SellerSignupFinal from './components/seller/SignupFinal';
import UserSignup from './components/user/UserSignup';
import ForbiddenAccess from './components/user/ForbiddenAccess';
import UserProfile from  './components/user/MyProfile';


import SellerDashboardLayout from './components/layouts/SellerDashboard';
import SellerDashboard from './components/seller/Dashboard';
import SellerOrders from './components/seller/MyOrders';
import VendorProductsSeller from  './components/seller/VendorProducts';
import SellerManageProducts from  './components/seller/ManageProducts';
import SellerBilling from  './components/seller/Billing';
import SellerManageWebsite from  './components/seller/ManageWebsite';
import SellerSales from  './components/seller/MySales';


import VendorDashboardLayout from './components/layouts/VendorDashboard';
import VendorDashboard from './components/vendor/Dashboard';
import VendorManageProducts from  './components/vendor/ManageProduct';
import VendorUploadProducts from  './components/vendor/UploadProducts';
import VendorOrdersPending from  './components/vendor/PendingOrders';
import VendorOrdersInProgress from  './components/vendor/OrdersInProgress';
import VendorBilling from  './components/vendor/Billing';
import VendorShipping from  './components/vendor/Shipping';

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
            { meta: { title: 'Seller Orders' }, path: '/admin/seller-orders', component: AdminSellerOrders },
            { meta: { title: 'Vendor Orders' }, path: '/admin/vendor-orders', component: AdminVendorOrders },
            { meta: { title: 'Payment Details' }, path: '/admin/payment-details', component: AdminPaymentDetails },
            { meta: { title: 'Payment History' }, path: '/admin/payment-history', component: AdminPaymentHistory },
            { meta: { title: 'Seller Reports' }, path: '/admin/seller-reports', component: AdminSellerReports },
            { meta: { title: 'Vendor Reports' }, path: '/admin/vendor-reports', component: AdminVendorReports },
        ]},

        // Seller Dashboard
        { name: 'sellerLayout', meta: { middleware:"auth" }, path: '/seller', component: SellerDashboardLayout, children: [
            { name: 'seller-dashboard', meta: { title: 'Overview' }, path: '/seller/dashboard', component: SellerDashboard },
            { name: 'seller-manage-products', meta: { title: 'Manage Products' }, path: '/seller/manage/products', component: SellerManageProducts },
            { name: 'seller-order', meta: { title: 'My Orders' }, path: '/seller/orders', component: SellerOrders },
            { name: 'seller-vendor-products', meta: { title: 'Vendor Products' }, path: '/seller/vendor-products', component: VendorProductsSeller },
            { name: 'seller-billing', meta: { title: 'Billing' }, path: '/seller/billing', component: SellerBilling },
            { name: 'seller-manage-website', meta: { title: 'Manage Website' }, path: '/seller/manage-website', component: SellerManageWebsite },
            { name: 'seller-sales', meta: { title: 'Sales' }, path: '/seller/sales', component: SellerSales },
            { name: 'seller-profile', meta: { title: 'Profile' }, path: '/seller/profile', component: UserProfile }
        ]},

        // Vendor Dashboard
        { name: 'vendorLayout', meta: { middleware:"auth" }, path: '/vendor', component: VendorDashboardLayout, children: [
            { name: 'vendor-dashboard', meta: { title: 'Overview' }, path: '/vendor/dashboard', component: VendorDashboard },
            { name: 'vendor-manage-products', meta: { title: 'Manage Products' }, path: '/vendor/manage/products', component: VendorManageProducts },
            { name: 'vendor-billing', meta: { title: 'Billing' }, path: '/vendor/billing', component: VendorBilling },
            { name: 'vendor-upload-products', meta: { title: 'Upload Products' }, path: '/vendor/upload/products', component: VendorUploadProducts },
            { name: 'vendor-orders-pending', meta: { title: 'Pending Orders' }, path: '/vendor/orders/pending', component: VendorOrdersPending },
            { name: 'vendor-orders-in-progress', meta: { title: 'Orders in Progress' }, path: '/vendor/orders/in-progress', component: VendorOrdersInProgress },
            { name: 'vendor-shipping', meta: { title: 'Shipping' }, path: '/vendor/shipping', component: VendorShipping },
            { name: 'vendor-profile', meta: { title: 'Profile' }, path: '/vendor/profile', component: UserProfile }
        ]},

        /*
         * Non Secure Routes
         */
        { name: 'login', meta: { title: 'Login', middleware:'guest' }, path: '/', component: UserLogin },
        { name: 'vendor-signup', meta: { title: 'Vendor Signup', middleware:'guest' }, path: '/vendor-signup', component: VendorSignup },
        { name: 'seller-signup', meta: { title: 'Seller Signup' }, path: '/seller-signup', component: SellerSignup },
        { name: 'seller-final', meta: { title: 'Seller Signup' }, path: '/seller-signup-final', component: SellerSignupFinal },
        { meta: { title: 'User Signup' }, path: '/user-signup', component: UserSignup },
        { name: 'forbidden', meta: { title: 'Forbidden Access' }, path: '/forbidden', component: ForbiddenAccess }
    ]
}
