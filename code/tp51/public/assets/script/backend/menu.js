App.set('menu_current', 'dashboard');

App.set('menu', [
    {
        label: '控制台',
        name: 'control',
        class: 'be-dashboard',
        children: [
            { label: '状态', name: 'dashboard', icon: 'admin-home' },
            { label: '日志', name: 'logger', icon: 'clock' }
        ]
    },
    {
        label: '内容',
        name: 'content',
        class: 'be-content',
        children: [
            { label: '博文', name: 'post', icon: 'admin-post' },
            { label: '归档', name: 'taxonomy', icon: 'portfolio' },
            { label: '菜单', name: 'menu', icon: 'admin-links' },
            { label: '媒体', name: 'media', icon: 'admin-media' },
            { label: '用户', name: 'user', icon: 'admin-users' }
        ]
    },
    {
        label: '工具',
        name: 'utility',
        class: 'be-utility',
        children: [
            { label: '主题', name: 'theme', icon: 'admin-appearance' },
            { label: '插件', name: 'plugin', icon: 'admin-plugins' },
            { label: '数据', name: 'database', icon: 'admin-network' },
            { label: '备份', name: 'tool', icon: 'screenoptions' }
        ]
    },
    {
        label: '设置',
        name: 'option',
        class: 'be-option',
        children: [
            { label: '全局', name: 'general', icon: 'translation' },
            { label: '系统', name: 'system', icon: 'admin-settings' }
        ]
    }
]);
