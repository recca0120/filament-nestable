import Sortable from 'sortablejs';

// const Sortable = window.Sortable;

export default function nestableTreeComponent() {
    return {
        sortable: null,
        init() {
            const options = {
                draggable: '[x-sortable-item]',
                handle: '[x-sortable-handle]',
                dataIdAttr: 'x-sortable-item',
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                emptyInsertThreshold: 30,
            };

            this.sortable = Sortable.create(this.$el, options);
        },
    };
}
