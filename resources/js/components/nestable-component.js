function serialize(/** HTMLElement */node) {
    const serialized = [];
    const children = Array.from(node.querySelectorAll(':scope > [x-sortable-item]'));
    for (const i in children) {
        const child = children[i].querySelector('[x-data=nestableTreeComponent]');
        serialized.push({
            id: children[i].getAttribute('x-sortable-item'),
            children: child ? serialize(child) : [],
        });
    }

    return serialized;
}

export default function nestableComponent() {
    return {
        collapsedAll: false,
        toggle(collapsed) {
            this.collapsedAll = collapsed;
        },
        async updateTree() {
            await this.$wire.dispatch(
                'update-tree',
                serialize(this.$root.querySelector('[x-data=nestableTreeComponent]')),
            );
        },
    };
};

