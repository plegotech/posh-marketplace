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
import SellerDashboardLayout from './components/layouts/SellerDashboard';
import SellerMyOrders from './components/seller/MyOrders';
import VendorProductsSeller from  './components/seller/VendorProducts';

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
            { name: 'myOrders', meta: { title: 'My Orders' }, path: '/seller/myorders', component: SellerMyOrders },
            { name: 'vendorProducts', meta: { title: 'Vendor Products' }, path: '/seller/vendorproducts', component: VendorProductsSeller }
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
