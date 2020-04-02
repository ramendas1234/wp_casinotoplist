/**
 *  BLOCK: Article Top Content
 */
//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components
const { TextareaControl } = wp.components
registerBlockType('casinotoplist/article-top-content', {
    title: __('Article Top Content'),
    icon: 'archive',
    category: 'casinotoplist',
    keywords: [
        __('article top content'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        title: {
            type: 'string',
        },
         description: {
            type: 'string',
        },
         group_id: {
            type: 'string',
        },
        
        
    },

    edit(props) {

        var title = props.attributes.title;
        var description = props.attributes.description;
        var group_id = props.attributes.group_id;
        
        function onChangeTitle(content) {
            props.setAttributes({title: content});
        }
        var onChangeDescription = function (content) {
            props.setAttributes({description: content});
        };
        var onChangeGroupId = function (content) {
            props.setAttributes({group_id: content});
        };
        
        
        return (
                <div id="block-article-top" >
                    <TextControl
                        label={__('Group Id')}
                        onChange={onChangeGroupId} 
                        value={group_id}
                        placeholder={__('Group Id')}
                        />
                        <TextControl
                        label={__('Title')}
                        onChange={onChangeTitle} 
                        value={title}
                        placeholder={__('Title')}
                        />
                    <TextareaControl
                        label={__('Description')}
                        onChange={onChangeDescription} 
                        value={description}
                        placeholder={__('Description')}
                        />    
        
                </div>
                )
    },
    save(props) {
        return null
    },
})