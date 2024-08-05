<?php

namespace amribrahim34\BostaEgypt\Endpoints;


class DraftOrders extends BaseEndpoint
{
    public function createDraftOrder($data)
    {
        return $this->request('POST', '/draft-orders', $data);
    }

    public function getAll()
    {
        return $this->request('GET', '/draft-orders');
    }

    public function getById($id)
    {
        return $this->request('GET', "/draft-orders/{$id}");
    }

    public function update($id, $data)
    {
        return $this->request('PUT', "/draft-orders/{$id}", $data);
    }

    public function delete($id)
    {
        return $this->request('DELETE', "/draft-orders/{$id}");
    }
}
