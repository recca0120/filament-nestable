export default function nestableItemComponent() {
    return {
        collapsed: false,
        children: [],
        get style() {
            return this.collapsed ? { transform: 'rotate(90deg)' } : {};
        },
        init() {
            this.$watch('collapsedAll', value => this.collapsed = value);
            this.updateChildren();
        },
        toggle() {
            this.collapsed = !this.collapsed;
        },
        updateChildren() {
            this.children = Array.from(
                this.$el
                    .querySelector('[x-data=nestableTreeComponent]')
                    .querySelectorAll('[x-sortable-item]'));
        },
    };
};
