import nestableComponent from './components/nestable-component.js';
import nestableTreeComponent from './components/nestable-tree-component.js';
import nestableItemComponent from './components/nestable-item-component.js';

document.addEventListener('alpine:init', () => {
    Alpine.data('nestableComponent', nestableComponent);
    Alpine.data('nestableTreeComponent', nestableTreeComponent);
    Alpine.data('nestableItemComponent', nestableItemComponent);
});
