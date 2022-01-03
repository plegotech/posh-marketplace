import AdminDashboard from './components/admin/Dashboard';
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

export default {
    mode: 'history',

    routes: [
        /*
         * Routes for the Super Admin
         */
        { meta: { title: 'Dashboard' }, path: '/admin/dashboard', component: AdminDashboard },
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
        { meta: { title: 'Vendor Reports' }, path: '/admin/vendor-reports', component: AdminVendorReports }
    ]
}
