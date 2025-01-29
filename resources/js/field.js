

import DetailNovaDraftButton from './nova-draft-button/components/DetailButton';
import FormNovaDraftButton from './nova-draft-button/components/FormButton';
import IndexNovaPublishedField from './nova-published-field/components/IndexField';
import DetailNovaPublishedField from './nova-published-field/components/DetailButton';
import DetailNovaUnpublishButton from './nova-unpublish-button/components/Detail';
import FormNovaUnpublishButton from './nova-unpublish-button/components/Form';
import SimpleText from './simple-text/components/SimpleText.vue';

Nova.booting((app, store) => {

    app.component('index-simple-text', SimpleText)
    app.component('detail-simple-text', SimpleText)
    app.component('form-simple-text', SimpleText)

    app.component('detail-nova-draft-button', DetailNovaDraftButton);
    app.component('form-nova-draft-button', FormNovaDraftButton);

    app.component('index-nova-published-field', IndexNovaPublishedField);
    app.component('detail-nova-published-field', DetailNovaPublishedField);


    app.component('detail-nova-unpublish-button', DetailNovaUnpublishButton);
    app.component('form-nova-unpublish-button', FormNovaUnpublishButton);
})
